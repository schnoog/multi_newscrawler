	<div class="row">
        <center>
            <h2><a href="https://newscrawler.eu"><small class="mysmall">NewsCrawler.eu</small></a> Newscrawler - Search <a href="https://twitter.com/schnoogsl" target="_blank"><small class="mysmall">A schnoogsl service</small></a></h2>
            
		
        <p>Search within {$cfg.recordnumber} the headlines from {$cfg.nslist}<br />
        All headlines excluding the topics -{foreach $cfg.nosafe as $nosave}{$nosave}-{/foreach} since January 1st 2010 (<small>daily updated</small>)
        
        </p>
        
        </center>
        <div class="col-md-2">
            <table><tr><td>
            <button class="btn" onclick="$('#predefdiv').toggleClass('hidden');" alt="Show / Hide predefined searches   " title="Show / Hide predefined searches"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></button>
			
            </td><td>
            
            <form method="post" id="searchform">
            <label for "newssource">Select the news source(s)</label>
            <select name="newssource" id="newssource" class="form-control">
                <option value="all" {if $cfg.ns_select == "all"}selected="selected"{/if}>All Sources</option>

                {foreach key=shortid item=longdata from=$cfg.ns}
                    <option value="{$shortid}" {if $cfg.ns_select == $shortid}selected="selected"{/if}>{$longdata.name}</option>
                {/foreach}
            </select>
            </td></tr></table>
        </div>
        <div class="col-md-3">
        <table  width="100%"><tr><td>
            <label for "searchterm">Containing any of the term(s)</label>
            <input type="text" name="searchterm" id="searchterm" value="{if isset($cfg.post.searchterm)}{$cfg.post.searchterm|escape}{/if}" class="form-control">
        </td><td>
            <center><label for "cisearch">Case<br />sensitive</label></center>
            <center><input type="checkbox" name="cisearch" id="cisearch" class="form-check-input" value="1" {if isset($cfg.post.cisearch)}{if $cfg.post.cisearch == "1"}checked{/if}{/if}></center>
        </td></tr></table>
        </div>

        <div class="col-md-3">
        <table  width="100%"><tr><td width="70%">
            <label for "exclsearchterm">Excluding any of the term(s)<br /></label>
            <input type="text" name="exclsearchterm" id="exclsearchterm" value="{if isset($cfg.post.exclsearchterm)}{$cfg.post.exclsearchterm|escape}{/if}" class="form-control">
        </td><td>
            <center><label for "ciexclsearch">Case<br />sensitive</label></center>
            <center><input type="checkbox" name="ciexclsearch" id="ciexclsearch" class="form-check-input" value="1" {if isset($cfg.post.ciexclsearch)}{if $cfg.post.ciexclsearch == "1"}checked{/if}{/if}></center>
        </td></tr></table>
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
        <div class="col-md-2">
            <table><tr><td>
            
            <input type="submit" id="searchlist" name="search_type" value="Get the List" class="form-control btn btn-success" >
            <select name="resultlimit" id="resultlimit" class="form-control">
                {foreach $cfg.resultlimits as $reslim }
                    <option value="{$reslim}">{$reslim}</option>
                {/foreach}

            </select>
            <small class="myextrasmall">Result limit</small>
            </td><td>&nbsp;</td><td>
            <small class="myextrasmall">Chart-Grouping</small>            
            <select name="graphtype" id="graphtype" class="form-control">
                {foreach from=$cfg.groupings key=timegroup item=timegrouplabel }
                    <option value="{$timegroup}" {if isset($cfg.post.graphtype)}{if $cfg.post.graphtype == $timegroup}selected="selected"{/if}{/if}>{$timegrouplabel}</option>
                {/foreach}

            </select>
            <input type="submit" name="search_type" value="Get the Graph" class="form-control btn btn-success" >
            </td></tr></table>
            </form>
            </center>
        
		</div>
	</div>
    
    <div class="row hidden" id="predefdiv">
        <center>
            <div class="col-md-3">
            <p>Some predefined searches</p>
            </div>
            <div class="col-md-6">
                <select id="predef" name="predef" class="form-control" onchange="selectPredefined(this.value);">
                        <option value="0"></option>
                    {foreach $cfg.predefined as $predlabel => $predid}
                        <option value="{$predid}">{$predlabel}</option>
                    {/foreach}
                </select> 
            </div>
            <div class="col-md-3">
            </div>
        </center>
    </div>

    {literal}
        <script type="text/javascript">
        
            function selectPredefined(selvalue){

                $.getJSON( 'ajaxbackend.php?predef=' + selvalue, function( data ) {
                var items = [];
                $.each( data, function( key, val ) {
                    if(key != "id"){
                        if((key == 'cisearch') || (key == 'ciexclsearch') ){
                                if(val == 1){
                                    $('#' + key).prop("checked", true);
                                }else{
                                    $('#' + key).prop("checked", false);
                                }
                        }else{
                        $('#' + key).val(val);
                        }
                    }
                });
                });


            }

        

        </script>    
    {/literal}