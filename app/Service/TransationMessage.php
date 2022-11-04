<?php

namespace App\Service;

use Illuminate\Http\Request;


class TransationMessage
{

    public function returnDestroyProductMessage(Request $request, $productName)
    {
        $request->session()
            ->flash(
                'message',
                "Produto {$productName} Removido do Banco de Dados"
            );
    }

    public function returnAddProductMessage(Request $request, array $product)
    {
        $request->session()
            ->flash(
                'message',
                "Produto {$product['product_name']} Inserido no Banco de Dados"
            );
    }

    public function userPromotionMessage(Request $request, $userName)
    {
        $request->session()
            ->flash(
                'message',
                "{$userName} Se tornou Administrador"
            );
    }

    public function userDemotedMessage(Request $request, $userName)
    {
        $request->session()
            ->flash(
                'message',
                "Usuário {$userName} Se tornou User Comum"
            );
    }

    public function productInsertedCart(Request $request, $sucessConfirmation)
    {
        if ($sucessConfirmation) {
        $request->session()
            ->flash(
                'message',
                "Produto Inserido no Carrinho!"
            );
        }
        else {
        $request->session()
            ->flash(
                'message',
                "Desculpe, não temos o estoque necessário no momento. Para encomendas entre em contato pelo Whats ou E-mail"
            );
        }
    }

    public function newEmail(Request $request, string $email)
    {
        $request->session()
            ->flash(
                'message',
                "Email de Recuperação Enviado para {$email}. Por favor verifique também a caixa de SPAM"
            );
    }

    public function profileUpdatedSuccessfully(Request $request)
    {
        $request->session()
            ->flash(
                'message',
                "Perfil Atualizado Com Sucesso"
            );
    }

}
