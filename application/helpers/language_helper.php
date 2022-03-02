<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('language_selected')) {
    function language_selected($selected)
    {
        $language = array(
            'portuguese' => array(
                'email'       => array(
                    'register' => array(
                        'topic' => 'Confirme o seu cadastro',
                        'title' => 'Olá, obrigado por se inscrever no Cardyo.link',
                        'paragraph' => "<p>Você está a um passo de ter o seu próprio cartão e cardápio digital.</p>
                        <p>Clique abaixo para <strong>validar</strong> a sua conta.</p>",
                        'button'    => 'Confirmar agora',
                        'bottom'    => 'Se houver alguma dúvida, entre em contato com o nosso suporte:
                        <br />
                        hi@cardyo.link ou pelo WhatsApp: +55 24 98831-7770
                        <br />'
                    ),
                    'recover' => array(
                        'topic'     => 'Recupere a sua senha',
                        'title'     => 'Olá, recupere a sua senha do seu Cardyo',
                        'paragraph' => "<p>Caso você não tenha solicitado este email, favor desconsiderar o mesmo.</p>
                        <p>Clique abaixo para recuperar a sua conta.</p>",
                        'button'    => 'Alterar senha agora',
                        'bottom'    => 'Se houver alguma dúvida, entre em contato com o nosso suporte:
                        <br />
                        hi@cardyo.link ou pelo WhatsApp: +55 24 98831-7770
                        <br />'
                    ),
                ),
                'alert'       => array(
                    'send_btn'            => 'Enivar',
                    'delete_btn'          => 'Deletar',
                    'danger'              => '<i class="fas fa-exclamation-triangle"></i> Ops, esse nome já está em uso!',
                    'success'             => '<i class="fas fa-check-circle"></i> Tudo certo! Você pode usar esse nome.',
                    'is_premium'          => 'Este é um recurso premium. Você tem que ser premium para baixá-lo.',
                    'want_premium'        => 'Quero ser premium!',
                    'success'             => 'Sucesso!',
                    'error'               => 'Ops..',
                    'success_uri'         => 'Você salvou o seu link com sucesso.',
                    'error_uri'           => 'Você não pode usar esse link',
                    'invalid_format'      => 'Formato inválido',
                    'invalid_size'        => 'A imagem é muito grande, tente reduzi-la.',
                    'attention_delete'    => 'Atenção',
                    'confirm_delete'      => 'Você tem certeza que deseja deletar essa imagem?',
                    'confirm_delete_btn'  => 'Sim, delete a imagem',
                    'delete_account'      => 'Atenção!',
                    'delete_acc_confirm'  => 'Essa ação é irreversível. Você tem certeza que deseja deletar a sua conta?',
                    'type_password'       => 'Escreva a sua senha',
                    'wrong_pass_title'    => 'Senha errada.',
                    'wrong_pass'          => 'Você precisa informar a sua senha',
                    'success_delete_title' => 'Conta deletada',
                    'success_delete'      => 'Sua conta foi deletada com sucesso. Você será redirecionado.',
                    'media'               => array(
                        'success'         => 'Sucesso',
                        'content'         => 'As configurações foram salvas',
                    ),
                    'page'                => array(
                        'success'         => 'Sucesso',
                        'content'         => 'A página foi salva com sucesso.',
                    ),
                    'config'              => array(
                        'success'         => 'Sucesso',
                        'content'         => 'As configurações foram salvas.',
                    ),
                    'account'             => array(
                        'success'         => 'Sucesso',
                        'content'         => 'Dados salvos com sucesso',
                        'confirm'         => 'Confirmar',
                    )
                ),
                'home'        => array(
                    'header_menu' => array(
                        'about'     => 'Sobre',
                        'prices'    => 'Preços',
                        'register'  => 'Cadastre-se',
                        'login'     => 'Área do usuário',
                    ),
                    'footer_menu' => array(
                        'home'      => 'Início',
                        'register'  => 'Cadastre-se',
                        'privacy'   => 'Política de privacidade',
                        'terms'     => 'Termos de uso',
                    ),
                    'index'   => array(
                        'banner'   => 'Seu cartão <br /> de visitas <br /> <strong>agora é digital <br/> <span>e grátis.</span>',
                        'about_title' => 'Sobre o <strong>Cardyo</strong>',
                        'about'    => array(
                            'box_1'  => array(
                                'icon'    => 'icon-money.png',
                                'title'   => 'Econômico',
                                'content' => 'Sem taxas e custo com impressões desnecessárias.',
                            ),
                            'box_2'  => array(
                                'icon'    => 'icon-clock.png',
                                'title'   => 'Crie seu cartão em menos de 7 minutos',
                                'content' => 'Utilize os widgets, insira textos, descrição, personalize a cor dos botões e fontes.',
                            ),
                            'box_3'  => array(
                                'icon'    => 'icon-phone.png',
                                'title'   => 'Gerencie e controle tudo pelo celular',
                                'content' => 'Controle seu conteúdo, interaja com o seu cliente, altere seu perfil e sem burocracia.',
                            ),
                            'box_4'  => array(
                                'icon'    => 'icon-talk.png',
                                'title'   => 'Receba contatos pelo WhatsApp',
                                'content' => 'Divulgue suas redes sociais, tudo em um único lugar',
                            ),
                            'box_5'  => array(
                                'icon'    => 'icon-eco.png',
                                'title'   => 'Ecológico',
                                'content' => 'Chega de gastar com cartão de visitas, seus clientes estão online.',
                            ),
                            'box_6'  => array(
                                'icon'    => 'icon-like.png',
                                'title'   => 'Prático',
                                'content' => 'Organize seu conteúdo, compartilhe onde quiser.',
                            ),
                        ),
                        'about_site' => array(
                            'title'     => 'Afinal, o que é o <strong>Cardyo</strong>?',
                            'paragraph' => 'O Cardyo é um criador de cartão de visitas virtual no modelo de landing page. Através do Cardyo você consegue criar a sua página única, compartilhável e aumentar o seu alcance na internet.',
                            'link'      => 'Ver um exemplo',
                            'link_ahref' => 'https://cardyo.link/h30',
                        ),
                        'about_dashboard' => array(
                            'title'    => 'Dashboard intuitiva, modelo arrasta e solta',
                            'paragraph' => 'Utilize os widgets, insira textos, descrição, personalize a cor dos botões e fontes. Controle seu conteúdo, interaja com o seu cliente, altere seu perfil, sem burocracia.',
                            'link'      => 'Cadastre-se agora',
                            'link_ahref' => 'https://cardyo.link/register',
                        ),
                        'price' => array(
                            'title' => 'Quanto <strong>custa</strong>?',
                            'paragraph' => 'O Cardyo é uma solução completa que cabe no seu bolso. Comece gratuitamente e teste a plataforma, faça um upgrade para o plano premium quando desejar.',
                            'bundle' => array(
                                'bundle_1' => array(
                                    'title' => 'Grátis',
                                    'currency' => 'R$',
                                    'value' => '0',
                                    'month' => '/mês',
                                    'list' => array(
                                        'Até 10 widgets', 'Anúncios na página',
                                    ),
                                    'button' => 'Cadastrar agora',
                                ),
                                'bundle_2' => array(
                                    'title' => 'Premium',
                                    'currency' => 'R$',
                                    'value' => '12',
                                    'month' => '/mês',
                                    'list' => array(
                                        'Widgets ilimitados', 'Sem anúncios na página',
                                        'QR Code'
                                    ),
                                    'button' => 'Cadastrar agora',
                                )
                            ),
                        ),
                        'faq' => array(
                            'title' => 'Perguntas frequentes',
                            'faq_box' => array(
                                'faq_1' => array(
                                    'question' => 'A ferramenta tem suporte?',
                                    'answer'   => 'Sim, contate-nos pelo e-mail hi@cardyo.link',
                                ),
                                'faq_2' => array(
                                    'question' => 'A ferramenta é gratuita?',
                                    'answer'   => 'Sim, é gratuito para sempre, mas você pode optar pela versão premium que contém alguns benefícios e melhorias.',
                                ),
                                'faq_3' => array(
                                    'question' => 'Como funciona?',
                                    'answer'   => 'Você cria o seu cartão de visitas virtual que será semelhante a uma landing page. Acrescenta títulos, parágrafos, ícones e botões, do jeito que você desejar.',
                                ),
                                'faq_4' => array(
                                    'question' => 'Posso ter meu próprio domínio?',
                                    'answer'   => 'Sim, você pode redirecionar para o seu próprio domínio contratando um domínio e o seu próprio serviço de hospedagem.',
                                ),
                            )
                        ),

                    ),
                    'terms'   => array(
                        'title' => 'Termos de uso',
                        'content'   => '<p>Ao acessar ao Cardyo você deve estar ciente e de acordo com os termos de uso aqui estabelecidos. Caso não esteja de acordo com os termos, por favor, não utilize o site. O Cardyo se reserva ao direito de alterar a qualquer momento os termos de uso.</p>
                        <p>
                        O Cardyo garante acesso limitado apenas aos que estiverem de acordo e cumprirem os termos de uso. O Cardyo se reserva ao direito de limitar o acesso a qualquer um, a qualquer momento e por qualquer motivo.
                        </p>
                        <p>
                        Todos os conteúdos deste site são apenas para fins informativos, não devem ser considerados completos, atualizados, e não se destinam a ser utilizado no lugar de uma consulta jurídica, médica, financeira, ou de qualquer outro profissional. Os conteúdos são fornecidos sem qualquer tipo de garantia. Todo e qualquer risco da utilização dos conteúdos é assumido pelo próprio usuário.
                        </p>'
                    ),
                    'privacy' => array(
                        'title' => 'Políticas de privacidade',
                        'content'   => '<p>O Cardyo, reconhece que a privacidade é importante.</p>
                        <p>O Cardyo recebe e mantém informações de seu browser nos nossos servidores, incluindo seu IP ou endereço de referência e a página que você procurou. Além desta informação, a única outra informação pessoal que nós coletamos sobre você é a que nos for fornecida em nossos formulários online. O Cardyo será a única detentora desta informação. Esta informação somente será usada para nosso acompanhamento estatístico do número de visitas.
                            O site usa cookies e outras tecnologias para melhorar a sua experiência on-line e para saber como você usa nossos serviços, com a finalidade de melhorar a qualidade deles.
                        </p>
                        <p>
                            Usamos empresas de publicidade de terceiros para veicular anúncios durante a sua visita ao nosso website. Essas empresas podem usar informações (que não incluem o seu nome, endereço, endereço de e-mail ou número de telefone) sobre suas visitas a este e a outros websites a fim de exibir anúncios relacionados a produtos e serviços de seu interesse. Para obter mais informações sobre essa prática e saber como impedir que as empresas utilizem esses dados.
                        </p>'
                    ),
                ),
                'login'       => array(
                    'title'        => 'Efetue o login em sua conta.',
                    'email_input'  => 'Email',
                    'pass_input'   => 'Password',
                    'forgot_pass'  => 'Esqueceu a senha?',
                    'login_btn'    => 'Login',
                    'new_user'     => 'Ainda não possui cadastro?',
                    'new_user_btn' => 'Cadastre-se aqui.',
                    'alert'        => array(
                        'invalid_account' => 'O email ou a senha inválida.',
                        'repeat_email'    => 'Repita corretamente o seu email.',
                        'email_confirm'   => 'Atenção, é necessário confirmar o email.',
                        'strong_pass'     => 'Escreva uma senha mais forte.',
                        'invalid_email'   => 'Escreva um email válido.',
                        'verify_email'    => '<h2>Sucesso!<h2><h4> Verifique o seu email, você receberá um email para confirmar o seu cadastro.</h4>',
                        'error'           => 'Atenção: Algo deu errado.',
                        'email_exists'    => 'Atenção: O email já está cadastrado.',
                    )
                ),
                'register'       => array(
                    'title'        => 'Criar uma conta grátis.',
                    'name_input'   => 'Seu nome',
                    'email_input'  => 'Seu email',
                    'email_input_2' => 'Repita o seu email',
                    'pass_input'   => 'Password',
                    'register_btn' => 'Cadastrar',
                ),
                'recover'       => array(
                    'title'        => 'Digite abaixo o seu email de cadastro.',
                    'email_input'  => 'Digite o seu email',
                    'register_btn' => 'Cadastrar',
                    'recover'      => 'Recuperar',
                    'new_user'     => 'Ainda não possui cadastro?',
                    'new_user_btn' => 'Cadastre-se aqui.',
                    'alert'        => array(
                        'wait'     => '<span class="danger">Aguarde...</span>',
                        'success'  => '<span class="success"><i class="fas fa-check-circle"></i> Um email foi enviado para sua caixa de mensagem!</span>',
                        'error'    => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Email incorreto <br/>ou inexistente!</span>',
                    )
                ),
                'redefine'     => array(
                    'title' => 'Escreva abaixo a sua 
                    <strong>nova senha.</strong>',
                    'recover_btn' => 'Redefinir senha',
                    'new_pass'  => 'Nova senha',
                    'repeat_pass' => 'Repita sua nova senha',
                    'alert'       => array(
                        'error_pass'   => '<span class="danger"><i class="fas fa-exclamation-circle"></i> As senhas precisam ser iguais.</span>',
                        'strong_pass'  => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Defina uma senha com pelo menos <strong>6 caracteres</strong>',
                        'success'      => '<span class="success"><i class="fas fa-check-circle"></i> Senha atualizada!</span>',
                        'try_again'    => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Por favor, tente novamente.</span>',
                        'update_pass'  => '<span class="danger">Atualizando a senha... </span>',
                    )
                ),
                'confirm'  => array(
                    'title'    => 'Conta criada com sucesso.',
                    'redirect' => 'Você será redirecionado em',
                    'time'     => 'segundos',
                ),
                'sidebar'     => array(
                    'page_maker'  => 'Criador de página',
                    'divulgation' => 'Divulgação',
                    'account'     => 'Sua conta',
                    'premium'     => 'Premium',
                    'exit'        => 'Sair',
                    'lang'        => 'Idioma'
                ),
                'custom_page' => array(
                    'url_alert'               => 'Atenção: Você precisa configurar o seu link.',
                    'url_alert_msg'           => 'Clique aqui para configurar.',
                    'page_header'             => 'Sua página',
                    'page_header_description' => 'Utilize os widgets para montar a sua página.',
                    'page_title'              => 'Título principal',
                    'page_description'        => 'Descrição',
                    'close_widgets'           => 'Fechar',
                    'widgets' => array(
                        'title' => 'Título',
                        'text'  => 'Texto',
                        'icons' => 'Ícones',
                        'link'  => 'Link'
                    ),
                    'elements' => array(
                        'icon'         => 'Ícone',
                        'icon_label'   => 'Texto do ícone',
                        'button'       => 'Botão',
                        'button_label' => 'Título do botão',
                        'link_label'   => 'Link do botão',
                        'text'         => 'Bloco de texto',
                        'text_label'   => 'Escreva seu texto',
                        'title'        => 'Título',
                        'title_label'  => 'Título'
                    ),
                    'config'              => 'configurações',
                    'title_font_selector' => 'Fonte do título',
                    'text_font_selector'  => 'Fonte do texto',
                    'title_color'         => 'Cor dos títulos',
                    'button_color'        => 'Cor dos botões',
                    'icon_color'          => 'Cor dos ícones',
                    'save_btn'            => 'Salvar configurações',
                    'save_page_btn'       => 'Salvar página',
                    'send_btn'            => 'Enviar',
                    'delete_btn'          => 'Excluir',
                ),
                'custom_config' => array(
                    'page_header'             => 'Configurações de divulgação',
                    'page_header_description' => 'Preencha os campos abaixo para a divulgação do seu Cardyo.',
                    'page_url'                => 'Seu link único',
                    'page_url_title'          => 'Ninguém terá o mesmo link que você. Escolha seu link exclusivo abaixo:',
                    'url_length'              => 'Max: 40 caracteres',
                    'find_btn'                => 'Salvar',
                    'qr_code'                 => 'Digitalize o código QR e tenha acesso imediato ao seu menu. Inclua-o em suas mesas, em materiais impressos ou onde quiser.',
                    'download'                => 'Baixar QR Code',
                    'social_media'            => 'Mídias sociais',
                    'page_input'              => 'Preencha o campo com o link completo',
                    'social_media_text'       => 'Escolha a rede social que você utiliza e preencha com o link completo',
                    'page_input'              => 'Preencha o campo com o link completo.',
                    'premium'                 => 'Recurso premium',
                    'label_whatsapp'          => 'Seu número',
                    'input_whatsapp'          => 'Preencha com o código do país e DDD',
                    'label_whatsapp_msg'      => 'Mensagem',
                    'input_whatsapp_msg'      => 'Escreva sua mensagem personalizada',
                ),
                'custom_account' => array(
                    'page_header'             => 'Sua conta',
                    'page_header_description' => 'Administre sua conta no formulário abaixo.',
                    'label_name'              => 'Nome',
                    'label_email'             => 'Email',
                    'alert_email'             => 'Não é possível alterar manualmente o email. Contate o suporte para alterar.',
                    'label_password'          => 'Senha',
                    'save_btn'                => 'Salvar',
                    'delete_account'          => 'Deletar a conta',
                    'account_status'          => 'Status da conta:',
                    'account_free_type'       => 'Conta gratuita',
                    'account_premium_type'    => 'Conta premium',
                    'account_delete'          => 'Outras opções:',
                    'account_delete_btn'      => 'Quero excluir a minha conta',
                ),
                'custom_premium' => array(
                    'page_header'             => '',
                    'page_header_description' => '',
                )
            ),
            'english' => array(
                'email'       => array(
                    'register' => array(
                        'topic' => 'Confirm your registration',
                        'title' => 'Hi, thanks for signing up on Cardyo.link',
                        'paragraph' => "<p>You are one step away from having your own digital card and menu.</p>
                        <p>Click below to <strong>validate</strong> your account.</p>",
                        'button'    => 'Confirm now',
                        'bottom'    => 'If you have any questions, please contact our support:
                        <br />
                        hi@cardyo.link or by WhatsApp: +55 24 98831-7770
                        <br />'
                    ),
                    'recover' => array(
                        'topic'     => 'Recover your password',
                        'title'     => 'Hi, get your Cardyo password back',
                        'paragraph' => "<p>If you have not requested this email, please disregard it.</p>
                        <p>Click below to recover your account.</p>",
                        'button'    => 'Change password now',
                        'bottom'    => 'If you have any questions, please contact our support:
                        <br />
                        hi@cardyo.link or by WhatsApp: +55 24 98831-7770
                        <br />'
                    ),
                ),
                'alert'       => array(
                    'send_btn'            => 'Send',
                    'delete_btn'          => 'Delete',
                    'danger'              => '<i class="fas fa-exclamation-triangle"></i> This name is already in use',
                    'success'             => '<i class="fas fa-check-circle"></i> Good! You can use this name.',
                    'is_premium'          => 'This is a premium resource. You have to be a premium to download it',
                    'want_premium'        => 'I want to be premium!',
                    'success'             => 'Success!',
                    'error'               => 'Ops..',
                    'success_uri'         => 'Your custom URL was save successful.',
                    'error_uri'           => 'You can\'t use this link',
                    'invalid_format'      => 'Invalid format',
                    'invalid_size'        => 'The image is too large to upload and needs to be resized',
                    'attention_delete'    => 'Attention',
                    'confirm_delete'      => 'This image will be deleted',
                    'confirm_delete_btn'  => 'Yes!',
                    'delete_account'      => 'Attention!',
                    'delete_acc_confirm'  => 'This action is irreversible. Are you sure you want to delete your account?',
                    'type_password'       => 'Write your password',
                    'wrong_pass_title'    => 'Wrong password.',
                    'wrong_pass'          => 'You need to enter your password',
                    'success_delete_title' => 'Account deleted',
                    'success_delete'      => 'Your account has been successfully deleted. You will be redirected.',
                    'media'               => array(
                        'success'         => 'Success',
                        'content'         => 'Settings have been saved.',
                    ),
                    'page'                => array(
                        'success'         => 'Success',
                        'content'         => 'The page was saved successfully.',
                    ),
                    'config'              => array(
                        'success'         => 'Success',
                        'content'         => 'Settings have been saved.',
                    ),
                    'account'             => array(
                        'success'         => 'Success',
                        'content'         => 'Data saved successfully',
                        'confirm'         => 'Confirm',
                    ),
                ),
                'home'        => array(
                    'header_menu' => array(
                        'about'     => 'About',
                        'prices'    => 'Price',
                        'register'  => 'Register',
                        'login'     => 'Login',
                    ),
                    'footer_menu' => array(
                        'home'      => 'Home',
                        'register'  => 'Register',
                        'privacy'   => 'Privacy Policy',
                        'terms'     => 'Terms of use',
                    ),
                    'index'   => array(
                        'banner'   => 'Your business card  <strong>now <br/>is digital <br/> <span>and free.</span>',
                        'about_title' => 'About <strong>Cardyo</strong>',
                        'about'    => array(
                            'box_1'  => array(
                                'icon'    => 'icon-money.png',
                                'title'   => 'Economic',
                                'content' => 'No fees and cost of unnecessary printing.',
                            ),
                            'box_2'  => array(
                                'icon'    => 'icon-clock.png',
                                'title'   => 'Create your card in less than 7 minutes.',
                                'content' => 'Use widgets, insert text, description, customize button color and fonts.',
                            ),
                            'box_3'  => array(
                                'icon'    => 'icon-phone.png',
                                'title'   => 'Manage and control everything by mobile',
                                'content' => 'Control your content, interact with your customer, change your profile and no bureaucracy.',
                            ),
                            'box_4'  => array(
                                'icon'    => 'icon-talk.png',
                                'title'   => 'Receive contacts via WhatsApp',
                                'content' => 'Promote your social networks, all in one place',
                            ),
                            'box_5'  => array(
                                'icon'    => 'icon-eco.png',
                                'title'   => 'Ecological',
                                'content' => 'No more spending on business cards, your customers are online.',
                            ),
                            'box_6'  => array(
                                'icon'    => 'icon-like.png',
                                'title'   => 'Practical',
                                'content' => 'Organize your content, share wherever you want.',
                            ),
                        ),
                        'about_site' => array(
                            'title'     => 'But, what is the <strong>Cardyo</strong>?',
                            'paragraph' => 'Cardyo is a virtual business card creator in landing page template. Through Cardyo you can create your unique, shareable page and increase your reach on the internet.',
                            'link'      => 'See an example',
                            'link_ahref' => 'https://cardyo.link/h30',
                        ),
                        'about_dashboard' => array(
                            'title'    => 'Intuitive dashboard, drag and drop template',
                            'paragraph' => 'Use widgets, insert text, description, customize button color and fonts. Control your content, interact with your customer, change your profile, without bureaucracy.',
                            'link'      => 'Register now',
                            'link_ahref' => 'https://cardyo.link/register',
                        ),
                        'price' => array(
                            'title' => 'How much <strong>costs</strong>?',
                            'paragraph' => 'Cardyo is a complete solution that fits in your pocket. Get started for free and test the platform, upgrade to the premium plan whenever you want.',
                            'bundle' => array(
                                'bundle_1' => array(
                                    'title' => 'Free',
                                    'currency' => '$',
                                    'value' => '0',
                                    'month' => '/mo.',
                                    'list' => array(
                                        'Up to 10 widgets', 'Ads on page',
                                    ),
                                    'button' => 'Register now',
                                ),
                                'bundle_2' => array(
                                    'title' => 'Premium',
                                    'currency' => '$',
                                    'value' => '9',
                                    'month' => '/mo.',
                                    'list' => array(
                                        'Unlimited widgets', 'No ads on the page', 'QR Code'
                                    ),
                                    'button' => 'Register now',
                                )
                            ),
                        ),
                        'faq' => array(
                            'title' => 'Common questions',
                            'faq_box' => array(
                                'faq_1' => array(
                                    'question' => 'Is the tool has support?',
                                    'answer'   => 'Yes, contact us at hi@cardyo.link',
                                ),
                                'faq_2' => array(
                                    'question' => 'Is this website free?',
                                    'answer'   => 'Yes, it\'s free forever, but you can opt for the premium version which contains some benefits and improvements.',
                                ),
                                'faq_3' => array(
                                    'question' => 'How its works?',
                                    'answer'   => 'You create your virtual business card that will look like a landing page. Add titles, paragraphs, icons and buttons, just the way you want.',
                                ),
                                'faq_4' => array(
                                    'question' => 'Can I have my own domain?',
                                    'answer'   => 'Yes, you can redirect to your own domain by hiring a domain and your own hosting service.',
                                ),
                            )
                        ),

                    ),
                    'terms'   => array(
                        'title' => 'Terms of use',
                        'content'   => '<p>When accessing Cardyo, you must be aware of and agree to the terms of use set forth herein. If you do not agree with the terms, please do not use the site. Cardyo reserves the right to change the terms of use at any time.</p>
                        <p>
                        Cardyo grants limited access only to those who agree and comply with the terms of use. Cardyo reserves the right to limit access to anyone at any time and for any reason.
                        </p>
                        <p>
                        All content on this site is for informational purposes only, should not be considered complete, up-to-date, and is not intended to be used in lieu of legal, medical, financial, or any other professional consultation. The contents are provided without any kind of guarantee. Any and all risk of using the contents is assumed by the user.
                        </p>'
                    ),
                    'privacy' => array(
                        'title' => 'Privacy policies',
                        'content'   => '<p>Cardyo, recognizes that privacy is important.</p>
                        <p>Cardyo receives and maintains information from your browser on our servers, including your referring IP or address and the page you searched for. In addition to this information, the only other personal information we collect about you is that which you provide to us in our online forms. Cardyo will be the sole holder of this information. This information will only be used for our statistical tracking of the number of visits.
                            The website uses cookies and other technologies to improve your online experience and to find out how you use our services, in order to improve their quality.
                        </p>
                        <p>
                            We use third-party advertising companies to serve ads during your visit to our website. These companies may use information (not including your name, address, email address or telephone number) about your visits to this and other websites in order to display advertisements relating to products and services of interest to you. For more information about this practice and how to prevent companies from using this data.
                        </p>'
                    ),
                ),
                'login'       => array(
                    'title'        => 'Log in to your account.',
                    'email_input'  => 'Email',
                    'pass_input'   => 'Password',
                    'forgot_pass'  => 'Forgot password?',
                    'login_btn'    => 'Login',
                    'new_user'     => 'Still not registered?',
                    'new_user_btn' => 'Register here.',
                    'alert'        => array(
                        'invalid_account' => 'Invalid email or password.',
                        'repeat_email'    => 'Repeat your email correctly.',
                        'email_confirm'   => 'Attention, it is necessary to confirm the email.',
                        'strong_pass'     => 'Choose a stronger password.',
                        'invalid_email'   => 'Please enter a valid email.',
                        'verify_email'    => '<h2>Success!<h2><h4> Check your email, you will receive an email to confirm your registration.</h4>',
                        'error'           => 'Attention: Something went wrong.',
                        'email_exists'    => 'Attention: The email is already registered.',
                    )
                ),
                'register'       => array(
                    'title'        => 'Create a free account.',
                    'name_input'   => 'Your name',
                    'email_input'  => 'Your email',
                    'email_input_2' => 'Repeat your email',
                    'pass_input'   => 'Password',
                    'register_btn' => 'Register',
                ),
                'recover'       => array(
                    'title'        => 'Enter your registration email below.',
                    'email_input'  => 'Enter your email',
                    'register_btn' => 'Register',
                    'recover'      => 'Recover',
                    'new_user'     => 'Still not registered?',
                    'new_user_btn' => 'Register here.',
                    'alert'        => array(
                        'wait'     => '<span class="danger">Wait...</span>',
                        'success'  => '<span class="success"><i class="fas fa-check-circle"></i> An email has been sent to your inbox!</span>',
                        'error'    => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Incorrect <br/>or missing email address!</span>',
                    )
                ),
                'redefine'     => array(
                    'title' => 'Write your
                    <strong>new password.</strong>',
                    'recover_btn' => 'Redefine password',
                    'new_pass'  => 'New password',
                    'repeat_pass' => 'Repeat you password',
                    'alert'       => array(
                        'error_pass'   => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Passwords must match.</span>',
                        'strong_pass'  => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Set a password of at least <strong>6 characters</strong>',
                        'success'      => '<span class="success"><i class="fas fa-check-circle"></i> Password updated!</span>',
                        'try_again'    => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Please try again.</span>',
                        'update_pass'  => '<span class="danger">Updating password... </span>',
                    )
                ),
                'confirm'  => array(
                    'title'    => 'Account created successfully.',
                    'redirect' => 'You will be redirected on',
                    'time'     => 'seconds',
                ),
                'sidebar'     => array(
                    'page_maker'  => 'Page maker',
                    'divulgation' => 'Divulgation',
                    'account'     => 'Account',
                    'premium'     => 'Premium',
                    'exit'        => 'Logout',
                    'lang'        => 'Language'
                ),
                'custom_page' => array(
                    'page_header'             => 'Your page',
                    'page_header_description' => 'Use the widgets to build your page.',
                    'page_title'              => 'Main title',
                    'page_description'        => 'Main description',
                    'url_alert'               => 'Attention: You need to configure your custom link.',
                    'url_alert_msg'           => 'Click here to configure.',
                    'close_widgets'           => 'Close',
                    'widgets' => array(
                        'title' => 'Title',
                        'text'  => 'Text',
                        'icons' => 'Icon',
                        'link'  => 'Link'
                    ),
                    'elements' => array(
                        'icon'         => 'Icon',
                        'icon_label'   => 'Icon text',
                        'button'       => 'Button',
                        'button_label' => 'Button title',
                        'link_label'   => 'Button link',
                        'text'         => 'Text block',
                        'text_label'   => 'Write your text',
                        'title'        => 'Title',
                        'title_label'  => 'Title'
                    ),
                    'config'              => 'Tools',
                    'title_font_selector' => 'Title typography',
                    'text_font_selector'  => 'Text typography',
                    'title_color'         => 'Title color',
                    'button_color'        => 'Button color',
                    'icon_color'          => 'Icon color',
                    'save_btn'            => 'Save config',
                    'save_page_btn'       => 'Save page',
                    'send_btn'            => 'Send',
                    'delete_btn'          => 'Delete',
                ),
                'custom_config' => array(
                    'page_header'             => 'Divulgation settings',
                    'page_header_description' => 'Fill in the fields below to share your <strong>Cardyo.</strong>',
                    'page_url'                => 'Your unique URL link',
                    'page_url_title'          => 'No one will have the same link as you. Choose your unique link below',
                    'url_length'              => 'Max: 40 characters',
                    'find_btn'                => 'Save!',
                    'qr_code'                 => 'Scan the QR Code and have immediate access to your menu. Include it on your desks, on printed materials, or wherever you want.',
                    'download'                => 'Download QR Code',
                    'social_media'            => 'Social media',
                    'social_media_text'       => 'Fill in the media you use with the full link.',
                    'page_input'              => 'Fill the complete URL link.',
                    'premium'                 => 'Premium resource',
                    'label_whatsapp'          => 'Your phone',
                    'input_whatsapp'          => 'Type your number with country code',
                    'label_whatsapp_msg'      => 'Custom message',
                    'input_whatsapp_msg'      => 'Type your custom message',
                ),
                'custom_account' => array(
                    'page_header'             => 'Your account',
                    'page_header_description' => 'Manage your account in the form below.',
                    'label_name'              => 'Name',
                    'label_email'             => 'Email',
                    'alert_email'             => 'It is not possible to manually change the email. Contact support to change.',
                    'label_password'          => 'Password',
                    'save_btn'                => 'Save changes',
                    'delete_account'          => 'Delete account',
                    'account_status'          => 'Account Status:',
                    'account_free_type'       => 'Free account',
                    'account_premium_type'    => 'Premium account',
                    'account_delete'          => 'Other options:',
                    'account_delete_btn'      => 'I want to delete my account.',
                ),
                'custom_premium' => array(
                    'page_header'             => '',
                    'page_header_description' => ''
                )
            ),
            'spanish' => array(
                'email'       => array(
                    'register' => array(
                        'topic'     => 'Confirma tu registro',
                        'title' => 'Hola, gracias por registrarte en Cardyo.link',
                        'paragraph' => "<p> Estás a un paso de tener tu propia tarjeta digital y menú. </p>
                        <p> Haga clic a continuación para <strong> validar </strong> su cuenta. </p>",
                        'button'    => 'Confirmar ahora',
                        'bottom'    => 'Si tiene alguna pregunta, comuníquese con nuestro soporte:
                        <br />
                        hi@cardyo.link o por WhatsApp: +55 24 98831-7770
                        <br />'
                    ),
                    'recover' => array(
                        'topic'     => 'Recupera tu contraseña',
                        'title'     => 'Hola, recupera tu contraseña de Cardyo',
                        'paragraph' => "<p> Si no ha solicitado este correo electrónico, ignórelo. </p>
                        <p> Haga clic a continuación para recuperar su cuenta. </p>",
                        'button'    => 'Cambiar contraseña ahora',
                        'bottom'    => 'Si tiene alguna pregunta, comuníquese con nuestro soporte:
                        <br />
                        hi@cardyo.link o por WhatsApp: +55 24 98831-7770
                        <br />'
                    ),
                ),
                'alert'       => array(
                    'send_btn'            => 'Mandar',
                    'delete_btn'          => 'Apagar',
                    'danger'              => '<i class="fas fa-exclamation-triangle"></i> ¡Vaya, ese nombre ya está en uso!',
                    'success'             => '<i class="fas fa-check-circle"></i> ¡Todo cierto! Puedes usar este nombre.',
                    'is_premium'          => 'Esta es una característica premium. Tienes que ser premium para descargarlo.',
                    'want_premium'        => '¡Quiero ser premium!',
                    'success'             => '¡Éxito!',
                    'error'               => 'UPS...',
                    'success_uri'         => 'Ha guardado correctamente su link.',
                    'error_uri'           => 'No puede utilizar este link.',
                    'invalid_format'      => 'Formato inválido',
                    'invalid_size'        => 'La imagen es demasiado grande, intente reducirla.',
                    'attention_delete'    => 'Aviso',
                    'confirm_delete'      => '¿Estás seguro de que deseas eliminar esta imagen?',
                    'confirm_delete_btn'  => 'Si, borra la imagen',
                    'delete_account'      => '¡Atención!',
                    'delete_acc_confirm'  => 'Esta acción es irreversible. ¿Estás seguro de que deseas eliminar tu cuenta?',
                    'type_password'       => 'Escribe tu contraseña',
                    'wrong_pass_title'    => 'Contraseña incorrecta.',
                    'wrong_pass'          => 'Necesitas ingresar tu contraseña',
                    'success_delete_title' => 'Cuenta borrada',
                    'success_delete'      => 'Su cuenta ha sido eliminada correctamente. Serás redirigido.',
                    'media'               => array(
                        'success'         => 'Éxito',
                        'content'         => 'Los ajustes se han guardado.',
                    ),
                    'page'                => array(
                        'success'         => 'Éxito',
                        'content'         => 'La página se guardó correctamente.',
                    ),
                    'config'              => array(
                        'success'         => 'Éxito',
                        'content'         => 'Los ajustes se han guardado.',
                    ),
                    'account'             => array(
                        'success'         => 'Éxito',
                        'content'         => 'Datos guardados exitosamente',
                        'confirm'         => 'Confirmar',
                    )
                ),
                'home'        => array(
                    'header_menu' => array(
                        'about'     => 'Sobre',
                        'prices'    => 'Precios',
                        'register'  => 'Registrarse',
                        'login'     => 'Área de usuario',
                    ),
                    'footer_menu' => array(
                        'home'      => 'Home',
                        'register'  => 'Registrarse',
                        'privacy'   => 'Política de privacidad',
                        'terms'     => 'Terminos de uso',
                    ),
                    'index'   => array(
                        'banner'   => 'Su tarjeta de<br />  presentación <br /> <strong> ahora es digital <br/> <span> y gratuita. </span>',
                        'about_title' => 'Acerca de <strong> Cardyo </strong>',
                        'about'    => array(
                            'box_1'  => array(
                                'icon'    => 'icon-money.png',
                                'title'   => 'Económico',
                                'content' => 'Sin comisiones ni costes de impresión innecesarios.',
                            ),
                            'box_2'  => array(
                                'icon'    => 'icon-clock.png',
                                'title'   => 'Crea tu tarjeta en menos de 7 minutos',
                                'content' => 'Utilice widgets, inserte texto, descripciones, personalice el color y las fuentes de los botones.',
                            ),
                            'box_3'  => array(
                                'icon'    => 'icon-phone.png',
                                'title'   => 'Gestione y controle todo desde el móvil',
                                'content' => 'Controle su contenido, interactúe con su cliente, cambie su perfil y sin burocracia.',
                            ),
                            'box_4'  => array(
                                'icon'    => 'icon-talk.png',
                                'title'   => 'Recibe contactos a través de WhatsApp',
                                'content' => 'Promocione sus redes sociales, todo en un solo lugar',
                            ),
                            'box_5'  => array(
                                'icon'    => 'icon-eco.png',
                                'title'   => 'Ecológico',
                                'content' => 'No más gastos en tarjetas de presentación, sus clientes están en línea.',
                            ),
                            'box_6'  => array(
                                'icon'    => 'icon-like.png',
                                'title'   => 'Práctico',
                                'content' => 'Organiza tu contenido, compártelo donde quieras.',
                            ),
                        ),
                        'about_site' => array(
                            'title'     => 'Después de todo, ¿qué es la <strong> Cardyo </strong>?',
                            'paragraph' => 'Cardyo es un creador de tarjetas de presentación virtuales en plantillas de páginas de destino. A través de Cardyo, puede crear su página única que se puede compartir y aumentar su alcance en Internet.',
                            'link'      => 'Ver un ejemplo',
                            'link_ahref' => 'https://cardyo.link/h30',
                        ),
                        'about_dashboard' => array(
                            'title'    => 'Panel de control intuitivo, plantilla de arrastrar y soltar',
                            'paragraph' => 'Utilice widgets, inserte texto, descripciones, personalice el color y las fuentes de los botones. Controle su contenido, interactúe con su cliente, cambie su perfil, sin burocracia.',
                            'link'      => 'Regístrate ahora',
                            'link_ahref' => 'https://cardyo.link/register',
                        ),
                        'price' => array(
                            'title' => '¿Cuánto <strong> cuesta </strong>?',
                            'paragraph' => 'Cardyo es una solución completa que cabe en su bolsillo. Comience gratis y pruebe la plataforma, actualice al plan premium cuando lo desee.',
                            'bundle' => array(
                                'bundle_1' => array(
                                    'title' => 'Gratis',
                                    'currency' => '$',
                                    'value' => '0',
                                    'month' => '/mes',
                                    'list' => array(
                                        'Hasta 10 widgets', 'Anuncios en la página',
                                    ),
                                    'button' => 'Regístrate ahora',
                                ),
                                'bundle_2' => array(
                                    'title' => 'Premium',
                                    'currency' => '$',
                                    'value' => '2',
                                    'month' => '/mes',
                                    'list' => array(
                                        'Widgets ilimitados', 'Sin anuncios en la página',
                                        'Código QR'
                                    ),
                                    'button' => 'Regístrate ahora',
                                )
                            ),
                        ),
                        'faq' => array(
                            'title' => 'Preguntas frecuentes',
                            'faq_box' => array(
                                'faq_1' => array(
                                    'question' => '¿La herramienta es compatible?',
                                    'answer'   => 'Sí, contáctanos en hi@cardyo.link',
                                ),
                                'faq_2' => array(
                                    'question' => '¿La herramienta es gratuita?',
                                    'answer'   => 'Sí, es gratis para siempre, pero puedes optar por la versión premium que contiene algunos beneficios y mejoras.',
                                ),
                                'faq_3' => array(
                                    'question' => '¿Como funciona?',
                                    'answer'   => 'Creas tu tarjeta de presentación virtual que se verá como una página de destino. Agregue títulos, párrafos, íconos y botones, de la manera que desee.',
                                ),
                                'faq_4' => array(
                                    'question' => '¿Puedo tener mi propio dominio?',
                                    'answer'   => 'Sí, puedes redireccionar a tu propio dominio contratando un dominio y tu propio servicio de hosting.',
                                ),
                            )
                        ),

                    ),
                    'terms'   => array(
                        'title' => 'Terminos de uso',
                        'content'   => '<p> Al acceder a Cardyo, debe conocer y aceptar los términos de uso aquí establecidos. Si no está de acuerdo con los términos, no utilice el sitio. Cardyo se reserva el derecho de cambiar los términos de uso en cualquier momento. </p>
                        <p>
                        Cardyo otorga acceso limitado solo a aquellos que están de acuerdo y cumplen con los términos de uso. Cardyo se reserva el derecho de limitar el acceso a cualquier persona en cualquier momento y por cualquier motivo.
                        </p>
                        <p>
                        Todo el contenido de este sitio es solo para fines informativos, no debe considerarse completo, actualizado y no está destinado a ser utilizado en lugar de una consulta legal, médica, financiera o cualquier otra consulta profesional. Los contenidos se proporcionan sin ningún tipo de garantía. El usuario asume todos y cada uno de los riesgos derivados del uso de los contenidos.
                        </p>'
                    ),
                    'privacy' => array(
                        'title' => 'Políticas de privacidad',
                        'content'   => '<p> Cardyo, reconoce que la privacidad es importante. </p>
                        <p> Cardyo recibe y mantiene información de su navegador en nuestros servidores, incluida su IP o dirección de referencia y la página que buscó. Además de esta información, la única otra información personal que recopilamos sobre usted es la que nos proporciona en nuestros formularios en línea. Cardyo será el único titular de esta información. Esta información solo se utilizará para nuestro seguimiento estadístico del número de visitas.
                            El sitio web utiliza cookies y otras tecnologías para mejorar su experiencia en línea y para saber cómo utiliza nuestros servicios, con el fin de mejorar su calidad.
                        </p>
                        <p>
                            Utilizamos empresas de publicidad de terceros para publicar anuncios durante su visita a nuestro sitio web. Estas empresas pueden utilizar información (sin incluir su nombre, dirección, dirección de correo electrónico o número de teléfono) sobre sus visitas a este y otros sitios web para mostrar anuncios relacionados con productos y servicios de su interés. Para obtener más información sobre esta práctica y cómo evitar que las empresas utilicen estos datos.
                        </p>'
                    ),
                ),
                'login'       => array(
                    'title'        => 'Ingrese a su cuenta.',
                    'email_input'  => 'Email',
                    'pass_input'   => 'Password',
                    'forgot_pass'  => 'Olvido la contraseña?',
                    'login_btn'    => 'Login',
                    'new_user'     => '¿Aún no estás registrado?',
                    'new_user_btn' => 'Registrar aquí.',
                    'alert'        => array(
                        'invalid_account' => 'Correo electrónico o contraseña no válidos.',
                        'repeat_email'    => 'Repite correctamente tu correo electrónico.',
                        'email_confirm'   => 'Atención, es necesario confirmar el correo electrónico.',
                        'strong_pass'     => 'Escribe una contraseña más segura.',
                        'invalid_email'   => 'Por favor introduzca una dirección de correo electrónico válida.',
                        'verify_email'    => '<h2> ¡Correcto! <h2> <h4> Revise su correo electrónico, recibirá un correo electrónico para confirmar su registro. </h4>',
                        'error'           => 'Atención: algo salió mal.',
                        'email_exists'    => 'Atención: el correo electrónico ya está registrado.',
                    )
                ),
                'register'       => array(
                    'title'        => 'Crea una cuenta nueva.',
                    'name_input'   => 'Su nombre',
                    'email_input'  => 'Su e-mail',
                    'email_input_2' => 'Repite tu correo electrónico',
                    'pass_input'   => 'Password',
                    'register_btn' => 'Registrar',
                ),
                'recover'       => array(
                    'title'        => 'Ingrese su correo electrónico de registro a continuación.',
                    'email_input'  => 'Introduce tu correo electrónico',
                    'register_btn' => 'Registrar',
                    'recover'      => 'Recuperar',
                    'new_user'     => '¿Aún no estás registrado?',
                    'new_user_btn' => 'Registrar aquí.',
                    'alert'        => array(
                        'wait'     => '<span class="danger">Aguarde...</span>',
                        'success'  => '<span class="success"><i class="fas fa-check-circle"></i> ¡Se ha enviado un correo electrónico a su bandeja de entrada!</span>',
                        'error'    => '<span class="danger"><i class="fas fa-exclamation-circle"></i> ¡Dirección de correo electrónico incorrecta o faltante!</span>',
                    )
                ),
                'redefine'     => array(
                    'title' => 'Escribe tu nueva
                    <strong> contraseña. </strong>',
                    'recover_btn' => 'Redefinir contraseña',
                    'new_pass'  => 'Nueva contraseña',
                    'repeat_pass' => 'Repite tu nueva contraseña',
                    'alert'       => array(
                        'error_pass'   => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Las contraseñas deben coincidir.</span>',
                        'strong_pass'  => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Establezca una contraseña de al menos <strong> 6 caracteres</strong>',
                        'success'      => '<span class="success"><i class="fas fa-check-circle"></i> ¡Contraseña actualiza!</span>',
                        'try_again'    => '<span class="danger"><i class="fas fa-exclamation-circle"></i> Inténtalo de nuevo.</span>',
                        'update_pass'  => '<span class="danger"> Actualizando contraseña... </span>',
                    )
                ),
                'confirm'  => array(
                    'title'    => 'Cuenta creada con éxito.',
                    'redirect' => 'Serás redirigido el',
                    'time'     => 'segundos',
                ),
                'sidebar'     => array(
                    'page_maker'  => 'Creador de páginas',
                    'divulgation' => 'Divulgación',
                    'account'     => 'Su cuenta',
                    'premium'     => 'Premium',
                    'exit'        => 'Salir',
                    'lang'        => 'Idioma'
                ),
                'custom_page' => array(
                    'url_alert'               => 'Atención: debe configurar su enlace.',
                    'url_alert_msg'           => 'Haga clic aquí para configurar.',
                    'page_header'             => 'Tu pagina',
                    'page_header_description' => 'Utilice widgets para crear su página.',
                    'page_title'              => 'Titulo principal',
                    'page_description'        => 'Descripción',
                    'close_widgets'           => 'Cerrar',
                    'widgets' => array(
                        'title' => 'Título',
                        'text'  => 'Texto',
                        'icons' => 'Iconos',
                        'link'  => 'Link'
                    ),
                    'elements' => array(
                        'icon'         => 'Iconos',
                        'icon_label'   => 'Texto del icono',
                        'button'       => 'Botón',
                        'button_label' => 'Título del botón',
                        'link_label'   => 'Link del botón',
                        'text'         => 'Bloque de texto',
                        'text_label'   => 'Escribe tu texto',
                        'title'        => 'Título',
                        'title_label'  => 'Título'
                    ),
                    'config'              => 'ajustes',
                    'title_font_selector' => 'Tipografía del título',
                    'text_font_selector'  => 'Tipografía del texto',
                    'title_color'         => 'Color de los títulos',
                    'button_color'        => 'Color del boton',
                    'icon_color'          => 'Color del icono',
                    'save_btn'            => 'Guardar ajustes',
                    'save_page_btn'       => 'Guardar página',
                    'send_btn'            => 'Salvar',
                    'delete_btn'          => 'Excluir',
                ),
                'custom_config' => array(
                    'page_header'             => 'Configuración de divulgación',
                    'page_header_description' => 'Complete los campos a continuación para dar a conocer su Cardyo.',
                    'page_url'                => 'Tu enlace único',
                    'page_url_title'          => 'Nadie tendrá el mismo vínculo que tú. Elija su enlace único a continuación:',
                    'url_length'              => 'Max: 40 caracteres',
                    'find_btn'                => 'Salvar',
                    'qr_code'                 => 'Escanee el código QR y obtenga acceso inmediato a su menú. Inclúyelo en tus escritorios, en materiales impresos o donde quieras.',
                    'download'                => 'Descargar código QR',
                    'social_media'            => 'Redes sociales',
                    'page_input'              => 'Complete el campo con el enlace completo',
                    'social_media_text'       => 'Elija la red social que usa y complete el enlace completo',
                    'page_input'              => 'Complete el campo con el enlace completo.',
                    'premium'                 => 'Característica premium',
                    'label_whatsapp'          => 'Su número',
                    'input_whatsapp'          => 'Complete con el código de país y el código de área',
                    'label_whatsapp_msg'      => 'Mensaje',
                    'input_whatsapp_msg'      => 'Escribe tu mensaje personalizado',
                ),
                'custom_account' => array(
                    'page_header'             => 'Su cuenta',
                    'page_header_description' => 'Administre su cuenta en el siguiente formulario.',
                    'label_name'              => 'Nombre',
                    'label_email'             => 'Email',
                    'alert_email'             => 'No es posible cambiar manualmente el correo electrónico. Comuníquese con el soporte para cambiar.',
                    'label_password'          => 'Contraseña',
                    'save_btn'                => 'Salvar',
                    'delete_account'          => 'Borrar cuenta',
                    'account_status'          => 'Estado de la cuenta:',
                    'account_free_type'       => 'Cuenta gratis',
                    'account_premium_type'    => 'Cuenta premium',
                    'account_delete'          => 'Otras opciones:',
                    'account_delete_btn'      => 'Quiero eliminar mi cuenta',

                ),
                'custom_premium' => array(
                    'page_header'             => '',
                    'page_header_description' => '',
                )
            ),
        );
        return $language[$selected];
    }
}

if (!function_exists('get_language')) {
    function get_language($language)
    {
        if (isset($language)) {
            if ($language == 'BR' || $language == 'ES' || $language == 'US') {
                switch ($language) {
                    case 'ES':
                        $lang = 'spanish';
                        break;
                    case 'US':
                        $lang = 'english';
                        break;
                    default:
                        $lang = 'portuguese';
                        break;
                }
            } else {
                $lang = 'portuguese';
            }
        } else {
            $lang = 'portuguese';
        }
        return $lang;
    }
}
