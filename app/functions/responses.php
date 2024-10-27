<?php
/**
 * Show front
 * @param string $partTemplate
 * @param array $data
 * @param string $template
 */
function render(string $partTemplate,array $data = [], string $template = VIEWS_TEMPLATE): void
{
    extract($data);
    include_once VIEWS_DIR . $template . '.php';
}


/**
 * Redirect to specify url
 * @param string $url
 */
function redirect(string $url) : never
{
    header('Location: ' . $url);
    exit();
}