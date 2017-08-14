<?php
	function secure_session() {
	    $session_name = 'session_id';   // Estabeleça um nome personalizado para a sessão
	    $secure = SECURE;
	    // Isso impede que o JavaScript possa acessar a identificação da sessão.
	    $httponly = true;
	    // Assim você força a sessão a usar apenas cookies. 
	   if (ini_set('session.use_only_cookies', 1) === TRUE) {
	        header("Location: ../404.php?err=Inicialização segura necessária (ini_set)");
	        exit();
	    }
	    // Obtém params de cookies atualizados.
	    $cookieParams = session_get_cookie_params();
	    session_set_cookie_params($cookieParams["lifetime"],
	        $cookieParams["path"], 
	        $cookieParams["domain"], 
	        $secure,
	        $httponly);
	    // Estabelece o nome fornecido acima como o nome da sessão.
	    session_name($session_name);
	    session_start();            // Inicia a sessão PHP 
	    session_regenerate_id();    // Recupera a sessão e deleta a anterior. 
	}
?>