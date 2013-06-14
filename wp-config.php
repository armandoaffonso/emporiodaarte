<?php
/** 
 * A configuração de base do WordPress
 *
 * Este ficheiro define os seguintes parâmetros: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, e ABSPATH. Pode obter mais informação
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} no Codex. As definições de MySQL são-lhe fornecidas pelo seu serviço de alojamento.
 *
 * Este ficheiro é usado para criar o script  wp-config.php, durante
 * a instalação, mas não tem que usar essa funcionalidade se não quiser. 
 * Salve este ficheiro como "wp-config.php" e preencha os valores.
 *
 * @package WordPress
 */

// ** Definições de MySQL - obtenha estes dados do seu serviço de alojamento** //
/** O nome da base de dados do WordPress */
define('DB_NAME', 'guilage_emporio');

/** O nome do utilizador de MySQL */
define('DB_USER', 'guilage_wpuser');

/** A password do utilizador de MySQL  */
define('DB_PASSWORD', 'r8}Ohcosd4Gj');

/** O nome do serviddor de  MySQL  */
define('DB_HOST', 'localhost');

/** O "Database Charset" a usar na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O "Database Collate type". Se tem dúvidas não mude. */
define('DB_COLLATE', '');

/**#@+
 * Chaves Únicas de Autenticação.
 *
 * Mude para frases únicas e diferentes!
 * Pode gerar frases automáticamente em {@link https://api.wordpress.org/secret-key/1.1/salt/ Serviço de chaves secretas de WordPress.org}
 * Pode mudar estes valores em qualquer altura para invalidar todos os cookies existentes o que terá como resultado obrigar todos os utilizadores a voltarem a fazer login
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K/Qj(R`P+hV$a{3fX{$7{+O)[{i;P%zu~.[b[J@#ZdM;a?Pch*#ulEYGfirV.nPx');
define('SECURE_AUTH_KEY',  '@_tqa+PSfy&9uOg&7|jbt_.^%,`1K-UWOK@>X|j5CNu,LU-J%}t!l-n_o[Nrw#bd');
define('LOGGED_IN_KEY',    ':e#4+S6gAAf!UG&Hg/17<X8OW3E-Q+rV<PVO9+|+#-*7|lbJ!g?w >nGvjtMQuQ=');
define('NONCE_KEY',        'ZRB=vO7-m[uQ5Bg*1g}%~J5Yq&7;fqk>{zO3qVH]%D<GI:uk+jQC5?{[U^bJm#SG');
define('AUTH_SALT',        '; r90D9!yV?]a)-t~#1wB4]+o2e{Md3~=|A^9+s.]c]U+1/K(S+/k^M&O}x|n-;;');
define('SECURE_AUTH_SALT', 'Db6@+2Y59v=_gN?I3Ce5fitl_sh)4bXk+`~] M(Eg;4sH[)}h@k66U&we]Os+7--');
define('LOGGED_IN_SALT',   'w8W{b}]!^PvWU.&h>YSGkS~<GSfQ!`ev}gB(!DB9*l jp>Y+%N@N4+!$0|][pcMi');
define('NONCE_SALT',       'y5!.x9OOe$dU:B|x|/0Hgt^Rq|En8ZHES2bj.ni~@WAoXV|qZ{Z;JwW|Da;< b<+');

/**#@-*/

/**
 * Prefixo das tabelas de WordPress.
 *
 * Pode suportar múltiplas instalações numa só base de dados, ao dar a cada
 * instalação um prefixo único. Só algarismos, letras e underscores, por favor!
 */
$table_prefix  = 'wp_';

/**
 * Idioma de Localização do WordPress, Inglês por omissão.
 *
 * Mude isto para localizar o WordPress. Um ficheiro MO correspondendo ao idioma
 * escolhido deverá existir na directoria wp-content/languages. Instale por exemplo
 * pt_PT.mo em wp-content/languages e defina WPLANG como 'pt_PT' para activar o
 * suporte para a língua portuguesa.
 */
define('WPLANG', 'pt_PT');

/**
 * Para developers: WordPress em modo debugging.
 *
 * Mude isto para true para mostrar avisos enquanto estiver a testar.
 * É vivamente recomendado aos autores de temas e plugins usarem WP_DEBUG
 * no seu ambiente de desenvolvimento.
 */
define('WP_DEBUG', false);

/* E é tudo. Pare de editar! */

/** Caminho absoluto para a pasta do WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Define as variáveis do WordPress e ficheiros a incluir. */
require_once(ABSPATH . 'wp-settings.php');
