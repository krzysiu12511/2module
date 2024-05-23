<?php
/**
 * <ModuleClassName> => Firstmodule
 * <FileName> => show.php
 * Format expected: <ModuleClassName><FileName>ModuleFrontController
 */
class FirstmoduleshowModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $htmlContent = Configuration::get("FIRSTMODULE_HTML");
        $id_lang = $this->context->language->id;
        $products = Db::getInstance()->executeS('SELECT name FROM ' ._DB_PREFIX_. 'product_lang  WHERE id_lang = '. (int)$id_lang);
        $this->context->smarty->assign([
            
            'products' => $products
        ]);

        $productsListContent = $this->context->smarty->fetch('module:firstmodule/views/templates/front/productsName.tpl');
    
        header('Content-Type: application/json');
        echo json_encode([
            'htmlContent' =>  html_entity_decode($htmlContent),
            'productListContent' => $productsListContent
        ]);
        exit;
    }


}