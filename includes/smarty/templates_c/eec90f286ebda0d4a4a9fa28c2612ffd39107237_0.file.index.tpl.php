<?php
/* Smarty version 3.1.36, created on 2020-07-15 22:23:23
  from 'H:\phpDEV\_SingleFiles\newscrawler\includes\smarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f0f65bb45cab9_73171664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eec90f286ebda0d4a4a9fa28c2612ffd39107237' => 
    array (
      0 => 'H:\\phpDEV\\_SingleFiles\\newscrawler\\includes\\smarty\\templates\\index.tpl',
      1 => 1594844599,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:searchbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f0f65bb45cab9_73171664 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:searchbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<?php if (is_array($_smarty_tpl->tpl_vars['data']->value)) {?>
    <?php $_prefixVariable1 = "list";
$_tmp_array = isset($_smarty_tpl->tpl_vars['cfg']) ? $_smarty_tpl->tpl_vars['cfg']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['searchtype'] = $_prefixVariable1;
$_smarty_tpl->_assignInScope('cfg', $_tmp_array);
if ($_prefixVariable1) {?>
        <pre><?php echo print_r($_smarty_tpl->tpl_vars['data']->value);?>
</pre>
    <?php } else { ?>
    <?php }
}?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
