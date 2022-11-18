<?php
class GeneralController{

    public function showMainMenu() {

      require_once "models/category.php";
      $menu = new Category();
      $show = $menu->MenuCategories();
      require_once "views/general/menu.php";
    }

    public function showFooter() {

      require_once "views/general/pie.php";
    }
}
?>