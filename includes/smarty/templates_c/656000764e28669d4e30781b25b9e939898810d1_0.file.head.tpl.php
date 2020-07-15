<?php
/* Smarty version 3.1.36, created on 2020-07-15 16:56:05
  from 'H:\phpDEV\_SingleFiles\newscrawler\includes\smarty\templates\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f0f1905b5f463_04320397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '656000764e28669d4e30781b25b9e939898810d1' => 
    array (
      0 => 'H:\\phpDEV\\_SingleFiles\\newscrawler\\includes\\smarty\\templates\\head.tpl',
      1 => 1594824946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f1905b5f463_04320397 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
  <title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['site_title'];?>
</title>
    <link rel="stylesheet" href="includes/my.css">
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.7"><?php echo '</script'; ?>
>

<!--<?php echo '<script'; ?>
 src="bower_components/sorting-filtering-pagination-fancytable/src/fancyTable.js"><?php echo '</script'; ?>
>-->


</head>
<body>
    <div class="container-fluid">

<?php }
}
