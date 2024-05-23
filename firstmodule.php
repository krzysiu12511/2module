<?php
if (!defined('_PS_VERSION_')) {
    exit;
}
class Firstmodule extends Module
{
    public function __construct()
    {
        $this->name = 'firstmodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Krzysztof';
        $this->need_instance = 0;
		$this->controllers = ['show'];
		
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('First Module');
        $this->description = $this->l('Wyświetla blok HTML na głównej stronie.');

        $this->confirmUninstall = $this->l('Czy na pewno chcesz odinstalować?');
		
		$this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
    }

    public function install()
    {
        if (!parent::install() 
		|| !$this->registerHook('displayHome') 
		|| !$this->registerHook('header') 
		|| !$this->registerHook('actionBuildFrontEndObject') 
		|| !Configuration::updateValue('FIRSTMODULE_HTML', 'Twoja domyślna treść HTML')) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() 
		|| !Configuration::deleteByName('FIRSTMODULE_HTML')) {
            return false;
        }
        return true;
    }

	public function hookHeader()
	{
		$this->context->controller->addCSS(array($this->_path.'views/css/firstmodule.css'));
		$this->context->controller->addJS(array($this->_path.'views/js/firstmodule.js'));
	}

    public function hookDisplayHome()
    {
        return $this->display(__FILE__, 'views/templates/hook/displayHome.tpl');
    }

	public function getContent()
	{
		if (Tools::isSubmit('submit' . $this->name)) {
			$my_module_html = Tools::getValue('FIRSTMODULE_HTML');
			Configuration::updateValue('FIRSTMODULE_HTML', $my_module_html, true);
		}
		return $this->displayForm();
	}

	public function hookActionBuildFrontEndObject($params) 
	{
		$params['obj']['firstmodule'] = array(
			'url' => $this->context->link->getModuleLink($this->name, 'show')
		);
	}

	public function displayForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$fields_form[0]['form'] = [
			'legend' => [
				'title' => $this->l('Settings'),
			],
			'input' => [
				[
					'type' => 'textarea',
					'label' => $this->l('Wyświetlany tekst na stronie'),
					'name' => 'FIRSTMODULE_HTML',
					'autoload_rte' => true, // Włączenie edytora WYSIWYG
					'lang' => false,
				],
			],
			'submit' => [
				'title' => $this->l('Save'),
				'class' => 'btn btn-default pull-right',
			],
		];

		$helper = new HelperForm();

		// Moduł i token
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

		// Język
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;

		// Tytuł i przybory
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;
		$helper->toolbar_scroll = true;
		$helper->submit_action = 'submit' . $this->name;
		$helper->toolbar_btn = [
			'save' =>
				[
					'desc' => $this->l('Save'),
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
						'&token='.Tools::getAdminTokenLite('AdminModules'),
				],
			'back' => [
				'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
				'desc' => $this->l('Back to list')
			],
		];

		// Załaduj aktualną wartość
		$helper->fields_value['FIRSTMODULE_HTML'] = Tools::getValue('FIRSTMODULE_HTML', Configuration::get('FIRSTMODULE_HTML'));

		return $helper->generateForm($fields_form);
	}
}