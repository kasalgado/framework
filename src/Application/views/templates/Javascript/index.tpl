<h3>{$lang_javascript}</h3>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {$lang_toggle_hidden}
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <button type="button" class="btn btn-success">{$lang_click_me}</button>
                <button type="button" class="btn btn-danger box-toggle">{$lang_toggle_hidden}</button>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    {$lang_ajax_json}
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="col-sm-3">
                    <input id="name-two" class="form-control" type="text" name="name-two" value="" placeholder="{$lang_firstname}" />
                </div>
                <button id="ajax-json" type="button" class="btn btn-default">{$lang_submit}</button>
                <div class="alert alert-info" role="alert">{$lang_wellcome} <span id="set-name"></span></div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    {$lang_ajax_html}
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <div class="col-sm-3">
                    <input id="name-three" class="form-control" type="text" name="name-three" value="" placeholder="{$lang_firstname}" />
                </div>
                <button id="ajax-html" type="button" class="btn btn-default">{$lang_submit}</button>
                <div id="set-html"></div>
            </div>
        </div>
    </div>
</div>

{include file='vars.tpl'}