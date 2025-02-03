<?php

if (Auth::check()) {
    echo "Usuário está logado!";
} else {
    echo "Usuário não está logado!";
}