	<div class="row">
        <center>
            <h2>Newscrawler - Search</h2>
		</center>
        <div class="col-md-2">
			<center> 
            
            <form method="post">
            <label for "newssource">Select the news source(s)</label>
            <select name="newssource" id="newssource" class="form-control">
                <option value="all" {if $cfg.ns_select == "all"}selected="selected"{/if}>All Sources</option>

                {foreach key=shortid item=longdata from=$cfg.ns}
                    <option value="{$shortid}" {if $cfg.ns_select == $shortid}selected="selected"{/if}>{$longdata.name}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-md-2">
            <label for "searchterm">Containing any of the term(s)<br /><small>comma separated</small></label>
            <input type="text" name="searchterm" id="searchterm" value="{if isset($cfg.post.searchterm)}{$cfg.post.searchterm|escape}{/if}" class="form-control">
        </div>
        <div class="col-md-1">
            <center><label for "cisearch">Case<br />sensitive</label></center>
            <center><input type="checkbox" name="cisearch" id="cisearch" class="form-check-input" value="1" {if isset($cfg.post.cisearch)}{if $cfg.post.cisearch == "1"}checked{/if}{/if}></center>
        </div>
        <div class="col-md-2">
            <label for "exclsearchterm">Excluding any of the term(s)<br /><small>comma separated</small></label>
            <input type="text" name="exclsearchterm" id="exclsearchterm" value="{if isset($cfg.post.exclsearchterm|escape)}{$cfg.post.exclsearchterm}{/if}" class="form-control">
        </div>

        <div class="col-md-1">
            <center><label for "ciexclsearch">Case<br />sensitive</label></center>
            <center><input type="checkbox" name="ciexclsearch" id="ciexclsearch" class="form-check-input" value="1" {if isset($cfg.post.ciexclsearch)}{if $cfg.post.ciexclsearch == "1"}checked{/if}{/if}></center>
        </div>
        <div class="col-md-2">
            <center><label for="timelimit">Time-range</label></center>
            <div class="form-group" id="timelimit">
                <center><table><tr><td>
                <center><label for "year_from"><small>From</small></label></center>
                <select name="year_from" id="year_from" class="form-control">
                    {foreach $cfg.years as $year}
                        <option value="{$year}" {if isset($cfg.post.year_from)}{if $cfg.post.year_from == $year}selected="selected"{/if}{/if}>{$year}</option>
                    {/foreach}
                </select>
                </td><td>
                <center><label for "year_to"><small>till</small></label></center>
                <select name="year_to" id="year_to" class="form-control">
                    {foreach $cfg.years|@array_reverse:true as $year}
                        <option value="{$year}" {if isset($cfg.post.year_to)}{if $cfg.post.year_to == $year}selected="selected"{/if}{/if}>{$year}</option>
                    {/foreach}

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
                {foreach from=$cfg.groupings key=timegroup item=timegrouplabel }
                    <option value="{$timegroup}" {if isset($cfg.post.graphtype)}{if $cfg.post.graphtype == $timegroup}selected="selected"{/if}{/if}>{$timegrouplabel}</option>
                {/foreach}

            </select>
            <input type="submit" name="search_type" value="Get the Graph" class="form-control btn btn-success" >
            </form>
            </center>
        
		</div>
	</div>
    <hr />