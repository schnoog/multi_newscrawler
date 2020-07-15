<?php
/* Smarty version 3.1.36, created on 2020-07-15 21:17:05
  from 'H:\phpDEV\_SingleFiles\newscrawler\includes\smarty\templates\searchbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f0f563138cc79_33161745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a14ffc9ed5cb627e930b8a150584ff30b41bc39b' => 
    array (
      0 => 'H:\\phpDEV\\_SingleFiles\\newscrawler\\includes\\smarty\\templates\\searchbar.tpl',
      1 => 1594840620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f563138cc79_33161745 (Smarty_Internal_Template $_smarty_tpl) {
?>	<div class="row">
        <center>
            <h2>Newscrawler - Search</h2>
		</center>
        <div class="col-md-2">
			<center> 
            
            <form method="post">
            <label for "newssource">Select the news source(s)</label>
            <select name="newssource" id="newssource" class="form-control">
                <option value="all" <?php if ($_smarty_tpl->tpl_vars['cfg']->value['ns_select'] == "all") {?>selected="selected"<?php }?>>All Sources</option>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cfg']->value['ns'], 'longdata', false, 'shortid');
$_smarty_tpl->tpl_vars['longdata']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['shortid']->value => $_smarty_tpl->tpl_vars['longdata']->value) {
$_smarty_tpl->tpl_vars['longdata']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['shortid']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cfg']->value['ns_select'] == $_smarty_tpl->tpl_vars['shortid']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['longdata']->value['name'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="col-md-2">
            <label for "searchterm">Containing any of the term(s)<br /><small>comma separated</small></label>
            <input type="text" name="searchterm" id="searchterm" value="<?php if ((isset($_smarty_tpl->tpl_vars['cfg']->value['post']['searchterm']))) {
echo $_smarty_tpl->tpl_vars['cfg']->value['post']['searchterm'];
}?>" class="form-control">
        </div>
        <div class="col-md-1">
            <center><label for "cisearch">Case<br />sensitive</label></center>
            <center><input type="checkbox" name="cisearch" id="cisearch" class="form-check-input" value="1" <?php if ((isset($_smarty_tpl->tpl_vars['cfg']->value['post']['cisearch']))) {
if ($_smarty_tpl->tpl_vars['cfg']->value['post']['cisearch'] == "1") {?>checked<?php }
}?>></center>
        </div>
        <div class="col-md-2">
            <label for "exclsearchterm">Excluding any of the term(s)<br /><small>comma separated</small></label>
            <input type="text" name="exclsearchterm" id="exclsearchterm" value="<?php if ((isset($_smarty_tpl->tpl_vars['cfg']->value['post']['exclsearchterm']))) {
echo $_smarty_tpl->tpl_vars['cfg']->value['post']['exclsearchterm'];
}?>" class="form-control">
        </div>

        <div class="col-md-1">
            <center><label for "ciexclsearch">Case<br />sensitive</label></center>
            <center><input type="checkbox" name="ciexclsearch" id="ciexclsearch" class="form-check-input" value="1" <?php if ((isset($_smarty_tpl->tpl_vars['cfg']->value['post']['ciexclsearch']))) {
if ($_smarty_tpl->tpl_vars['cfg']->value['post']['ciexclsearch'] == "1") {?>checked<?php }
}?>></center>
        </div>
        <div class="col-md-2">
            <center><label for="timelimit">Time-range</label></center>
            <div class="form-group" id="timelimit">
                <center><table><tr><td>
                <center><label for "year_from"><small>From</small></label></center>
                <select name="year_from" id="year_from" class="form-control">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cfg']->value['years'], 'year');
$_smarty_tpl->tpl_vars['year']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
$_smarty_tpl->tpl_vars['year']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['cfg']->value['post']['year_from']))) {
if ($_smarty_tpl->tpl_vars['cfg']->value['post']['year_from'] == $_smarty_tpl->tpl_vars['year']->value) {?>selected="selected"<?php }
}?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                </td><td>
                <center><label for "year_to"><small>till</small></label></center>
                <select name="year_to" id="year_to" class="form-control">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, array_reverse($_smarty_tpl->tpl_vars['cfg']->value['years'],true), 'year');
$_smarty_tpl->tpl_vars['year']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
$_smarty_tpl->tpl_vars['year']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['cfg']->value['post']['year_to']))) {
if ($_smarty_tpl->tpl_vars['cfg']->value['post']['year_to'] == $_smarty_tpl->tpl_vars['year']->value) {?>selected="selected"<?php }
}?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </select>
                </td></tr></table></center>
            </div>
        </div>
        <div class="col-md-1">
            <label for "searchlist">Search for headlines</label>
            <input type="submit" id="searchlist" name="search_type" value="Get the List" class="form-control btn btn-success" >
        </div>
        <div class="col-md-1">

            <label for "graphtype">Select graph grouing</label>
            <select name="graphtype" id="graphtype" class="form-control">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cfg']->value['groupings'], 'timegrouplabel', false, 'timegroup');
$_smarty_tpl->tpl_vars['timegrouplabel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['timegroup']->value => $_smarty_tpl->tpl_vars['timegrouplabel']->value) {
$_smarty_tpl->tpl_vars['timegrouplabel']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['timegroup']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['cfg']->value['post']['graphtype']))) {
if ($_smarty_tpl->tpl_vars['cfg']->value['post']['graphtype'] == $_smarty_tpl->tpl_vars['timegroup']->value) {?>selected="selected"<?php }
}?>><?php echo $_smarty_tpl->tpl_vars['timegrouplabel']->value;?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </select>
            <input type="submit" name="search_type" value="Get the Graph" class="form-control btn btn-success" >
            </form>
            </center>
        
		</div>
	</div>
    <hr /><?php }
}
