<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Payment;
use App\Models\Produto; // Importe seu modelo de Produto
use App\Models\Venda; // Importe seu modelo de Venda

class PagamentoController extends Controller
{
    public function __construct()
    {
        // Inicializa o SDK do Mercado Pago com o Access Token
        SDK::setAccessToken(config('mercadopago.access_token'));
    }

    public function criarPagamento(Request $request)
    {
        // Valida o request para garantir que o produto e a quantidade foram fornecidos
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Obtém o produto pelo ID
        $produto = Produto::find($request->produto_id);

        // Cria uma nova preferência de pagamento
        $preference = new Preference();

        // Define os itens do pagamento
        $item = new \MercadoPago\Item();
        $item->title = $produto->nome_produto; // Nome do produto
        $item->quantity = $request->quantidade; // Quantidade
        $item->unit_price = $produto->preco; // Preço unitário
        $preference->items = array($item);

        // Define a URL de retorno após o pagamento
        $preference->back_urls = [
            "success" => route('pagamento.sucesso'),
            "failure" => route('pagamento.falha'),
            "pending" => route('pagamento.pendente')
        ];
        $preference->auto_return = "approved";

        // Salva a preferência
        $preference->save();

        // Redireciona para a URL de checkout do Mercado Pago
        return redirect($preference->init_point);
    }

    public function sucesso(Request $request)
    {
        // Verifica o status do pagamento
        $paymentId = $request->get('payment_id');
        $payment = Payment::find($paymentId);

        if ($payment->status == 'approved') {
            // O pagamento foi aprovado
            // Aqui você pode salvar a venda no banco de dados
            $venda = new Venda();
            $venda->id_usuario = auth()->user()->id; // ID do usuário autenticado
            $venda->id_produto = $payment->item_id; // Você pode precisar armazenar o ID do produto
            $venda->valor_total = $payment->transaction_amount; // Valor total da venda
            $venda->save();

            return view('pagamento.sucesso', ['payment' => $payment]);
        } else {
            return redirect()->route('pagamento.falha')->with('error', 'Pagamento não aprovado.');
        }
    }

    public function falha()
    {
        // Exibe mensagem de falha no pagamento
        return view('pagamento.falha');
    }

    public function pendente()
    {
        // Exibe mensagem de pagamento pendente
        return view('pagamento.pendente');
    }
}
