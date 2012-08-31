<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: add.html.php 1821 2010-09-20 16:11:48Z Miguel_Espinoza $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if $idEdit}
<form method="post" action="{url link='admincp.realestate.add'}" enctype="multipart/form-data">
	<input type="hidden" name="frmEdit" value="edit" />
    <input type="hidden" name="val[realestate_id]" value="{$idEdit}" />
    <input type="hidden" name="val[position]" id="position" />
    <input type="hidden" name="val[images]" id="images" />
    <div id="main_real_estate_container">
        <div>

            <div class="table_header">
                {phrase var='realestate.admin_menu_add_real_estate'}
            </div>


            <!-- REAL ESTATE TITLE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_title_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_large" name="val[realestate_title]" value="{$data.title}" id="total" size="40" maxlength="300" />
                </div>
            </div>
            <!-- REAL ESTATE DESCRIPTION -->
            <div class="table">
                <div class="table_left table_left_custom" id="lbl_html_text">
                    {required}{phrase var='admincp.realstate_desc_label'}:
                </div>
                <div class="table_right table_right_custom">
                    {editor id='text' name='realestate_desc' rows='15'}{$data.desc}
                </div>
                <div class="clear"></div>
            </div>
            <!-- REAL ESTATE IMAGE UPLOAD -->

            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='subscribe.image'}:
                </div>
                <div class="table_right table_right_custom">
                    {if $bIsEdit && !empty($aForms.image_path)}
                    <div id="js_subscribe_image_holder">
                        {img server_id=$aForms.server_id title=$aForms.title path='subscribe.url_image' file=$aForms.image_path suffix='_120' max_width='120' max_height='120'}
                        <div class="extra_info">
                            <a href="#" onclick="if (confirm('{phrase var='subscribe.are_you_sure'}')) {left_curly} $('#js_subscribe_image_holder').remove(); $('#js_subscribe_upload_image').show(); $.ajaxCall('subscribe.deleteImage', 'package_id={$aForms.package_id}'); {right_curly} return false;">{phrase var='subscribe.change_this_image'}</a>
                        </div>
                    </div>
                    {/if}
                    <div id="js_subscribe_upload_image"{if $bIsEdit && !empty($aForms.image_path)} style="display:none;"{/if}>
                        <!-- <input type="file" name="image_path" size="20" /> -->


                        <div id="upload" style="margin-left:0px"><span>Upload File<span></div><span id="status" ></span>

                        <div style="margin-left:0px; width:400px;padding-left:0px;padding-top:0px;padding-bottom:0px;">
                            <ul id="files"></ul>
                            <div style="clear:both"></div>
                        </div>


                        <div class="extra_info">
                            {phrase var='subscribe.you_can_upload_a_jopg_gif_or_png_file'}
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

             <!-- REAL ESTATE ADDRESS -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realestate_form_insert_address'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[address]" value="{$data.address}" id="total" size="40" maxlength="300" />
                </div>
            </div>



             <!-- REAL ESTATE TYPE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_type_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[realestate_type]" value="{$data.realestate_type}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE YEAR BUILD -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_year_build_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[year_build]" value="{$data.year_build}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE LAST SOLD -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_last_sold_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[last_sold]" value="{if $data.last_sold neq '--'}{$data.last_sold}{/if}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE PARKING -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_parking_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[parking]" value="{if $data.parking neq '--'}{$data.parking}{/if}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE COOLING -->
            <div class="table">
                <div class="table_left table_left_custom">
                   {phrase var='admincp.admincp_realstate_cooling_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[cooling]" value="{if $data.cooling neq '--'}{$data.cooling}{/if}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE HEATING -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_heating_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[heating]" value="{if $data.heating neq '--'}{$data.heating}{/if}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE FIREPLACE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_fireplace_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[fireplace]" value="{if $data.fireplace neq '--'}{$data.fireplace}{/if}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE EXTERIOR MATERIAL -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_exterior_material_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <textarea rows="2" cols="50" name="val[exterior_material]">{if $data.exterior_material neq '--'}{$data.exterior_material}{/if}</textarea>
                </div>
            </div>

             <!-- REAL ESTATE FENCED YARD -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_fenced_yard_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[fenced_yard]" value="{if $data.fenced_yard neq '--'}{$data.fenced_yard}{/if}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE LEGAL DESCRIPTION -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_legal_desc_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <textarea rows="2" cols="50" name="val[legal_desc]">{$data.legal_desc}</textarea>
                </div>
            </div>


            <!-- REAL ESTATE ROOM COUNT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_roomno_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <select name="val[no_of_rooms]" style="width:200px;" class="dropdown_style_small">
                        <option value="">{phrase var='admincp.realstate_roomno_select'}</option>
                            <option value="1" {if $data.no_of_rooms eq 1} selected="selected" {/if}>1</option>
                            <option value="2" {if $data.no_of_rooms eq 2} selected="selected" {/if}>2</option>
                            <option value="3" {if $data.no_of_rooms eq 3} selected="selected" {/if}>3</option>
                            <option value="4" {if $data.no_of_rooms eq 4} selected="selected" {/if}>4</option>
                            <option value="5" {if $data.no_of_rooms eq 5} selected="selected" {/if}>5</option>
                            <option value="6" {if $data.no_of_rooms eq 6} selected="selected" {/if}>6</option>
                            <option value="7" {if $data.no_of_rooms eq 7} selected="selected" {/if}>7</option>
                            <option value="8" {if $data.no_of_rooms eq 8} selected="selected" {/if}>8</option>
                            <option value="9" {if $data.no_of_rooms eq 9} selected="selected" {/if}>9</option>
                            <option value="10" {if $data.no_of_rooms eq 10} selected="selected" {/if}>10</option>
                    </select>
                </div>
            </div>
            <div class="clear"></div>
            <!-- REAL ESTATE BATHROOM COUNT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_bathroomno_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <select name="val[no_of_bathrooms]" style="width:200px;" class="dropdown_style_small">
                        <option value="">{phrase var='admincp.realstate_bathroom_select'}</option>
                            <option value="1" {if $data.no_of_bathrooms eq 1} selected="selected" {/if}>1</option>
                            <option value="2" {if $data.no_of_bathrooms eq 2} selected="selected" {/if}>2</option>
                            <option value="3" {if $data.no_of_bathrooms eq 3} selected="selected" {/if}>3</option>
                            <option value="4" {if $data.no_of_bathrooms eq 4} selected="selected" {/if}>4</option>
                            <option value="5" {if $data.no_of_bathrooms eq 5} selected="selected" {/if}>5</option>
                    </select>
                </div>
            </div>
            <div class="clear"></div>

            <!-- REAL ESTATE PARCEL NO -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_parcel_no_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_small" name="val[parcel_no]" value="{if $data.parcel_no neq '--'}{$data.parcel_no}{/if}" id="total" size="40" maxlength="100" />
                </div>
            </div>
            <div class="clear"></div>

            <!-- REAL ESTATE PER FLOOR SQUARE FOOT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_per_floor_sqft_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_small" name="val[per_floor_sqft]" value="{$data.per_floor_sqft}" id="total" size="40" maxlength="100" /> $
                </div>
            </div>
            <div class="clear"></div>

            <!-- REAL ESTATE TOTAL SQUARE FOOT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_sqfoot_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_small" name="val[total_square_foot]" value="{$data.total_square_foot}" id="total" size="40" maxlength="100" /> sq.ft
                </div>
            </div>
            <div class="clear"></div>
            <!-- REAL ESTATE PURPOSE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_purpose_label'}:
                </div>

                <div class="table_right table_right_custom">


                    <div class="item_is_active_holder item_is_active_holder_custom">
                        <span class="js_item_active item_is_active item_is_active_custom" onclick="showDiv('is_rent');"><input type="radio" name="val[is_rent]" {if $data.is_rent eq 'Y'} checked="checked" {/if}  {value type='radio' id='is_rent' default='1'} /> {phrase var='admincp.realstate_rent_label'}</span>
                        <span class="js_item_active item_is_not_active item_is_not_active_custom" onclick="showDiv('is_sale');"><input type="radio" name="val[is_sale]" {if $data.is_sale eq 'Y'} checked="checked" {/if}  {value type='radio' id='is_sale' default='0'} /> {phrase var='admincp.realstate_sale_label'}</span>
                    </div>

                    {if $data.is_rent eq 'Y'}
                        <div id="rent_div" style="display:block;">
                    {else}
                    	<div id="rent_div">
                    {/if}
                        <input type="text" class="textbox_style_small" name="val[price_per_month]" value="{$data.price_per_month}" id="total" size="40" maxlength="100" />$ /month
                    </div>

                    {if $data.is_sale eq 'Y'}
                    <div id="sale_div" style="display:block;">
                    {else}
                    <div id="sale_div">
                    {/if}

                        <input type="text" class="textbox_style_small" name="val[total_price]" value="{$data.total_price}" id="total" size="40" maxlength="100" />$
                    </div>


                </div>
            </div>
            <div class="clear"></div>

            <!-- REAL ESTATE MAP -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}Select location:
                </div>

                <div class="table_right table_right_custom">
                    <div id="map"></div>
                    <div id="log"></div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="clear"></div>


            <div class="table_clear table_clear_custom">
                <input type="submit" value="{phrase var='admincp.realestate_add_submit'}" class="button" />
            </div>

        </div>
    </div>
</form>


{else}



<form method="post" action="{url link='admincp.realestate.add'}" enctype="multipart/form-data">
<input type="hidden" name="val[position]" id="position" />
<input type="hidden" name="val[images]" id="images" />
<input type="hidden" name="val[lat]" id="lat" />
<input type="hidden" name="val[lng]" id="lng" />
    <div id="main_real_estate_container">
        <div>

            <div class="table_header">
                {phrase var='realestate.admin_menu_add_real_estate'}
            </div>


            <!-- REAL ESTATE TITLE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_title_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_large" name="val[realestate_title]" value="" id="total" size="40" maxlength="300" />
                </div>
            </div>
            <!-- REAL ESTATE DESCRIPTION -->
            <div class="table">
                <div class="table_left table_left_custom" id="lbl_html_text">
                    {required}{phrase var='admincp.realstate_desc_label'}:
                </div>
                <div class="table_right table_right_custom">
                     {editor id='text' name='realestate_desc' rows='12'}
                </div>
                <div class="clear"></div>
            </div>


            <!-- REAL ESTATE IMAGE UPLOAD -->

            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='subscribe.image'}:
                </div>
                <div class="table_right table_right_custom">
                    {if $bIsEdit && !empty($aForms.image_path)}
                    <div id="js_subscribe_image_holder">
                        {img server_id=$aForms.server_id title=$aForms.title path='subscribe.url_image' file=$aForms.image_path suffix='_120' max_width='120' max_height='120'}
                        <div class="extra_info">
                            <a href="#" onclick="if (confirm('{phrase var='subscribe.are_you_sure'}')) {left_curly} $('#js_subscribe_image_holder').remove(); $('#js_subscribe_upload_image').show(); $.ajaxCall('subscribe.deleteImage', 'package_id={$aForms.package_id}'); {right_curly} return false;">{phrase var='subscribe.change_this_image'}</a>
                        </div>
                    </div>
                    {/if}
                    <div id="js_subscribe_upload_image"{if $bIsEdit && !empty($aForms.image_path)} style="display:none;"{/if}>
                        <!-- <input type="file" name="image_path" size="20" /> -->


                        <div id="upload" style="margin-left:0px"><span>Upload File<span></div><span id="status" ></span>

                        <div style="margin-left:0px; width:400px;padding-left:0px;padding-top:0px;padding-bottom:0px;">
                            <ul id="files"></ul>
                            <div style="clear:both"></div>
                        </div>


                        <div class="extra_info">
                            {phrase var='subscribe.you_can_upload_a_jopg_gif_or_png_file'}
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>


             <!-- REAL ESTATE ADDRESS -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realestate_form_insert_address'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[address]" value="{$data.address}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE TYPE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_type_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[realestate_type]" value="{$data.realestate_type}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE YEAR BUILD -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_year_build_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[year_build]" value="{$data.year_build}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE LAST SOLD -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_last_sold_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[last_sold]" value="{$data.last_sold}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE PARKING -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_parking_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[parking]" value="{$data.parking}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE COOLING -->
            <div class="table">
                <div class="table_left table_left_custom">
                   {phrase var='admincp.admincp_realstate_cooling_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[cooling]" value="{$data.cooling}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE HEATING -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_heating_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[heating]" value="{$data.heating}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE FIREPLACE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_fireplace_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[fireplace]" value="{$data.fireplace}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE EXTERIOR MATERIAL -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_exterior_material_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <textarea rows="2" cols="50" name="val[exterior_material]">{$data.exterior_material}</textarea>
                </div>
            </div>

             <!-- REAL ESTATE FENCED YARD -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_fenced_yard_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_medium" name="val[fenced_yard]" value="{$data.fenced_yard}" id="total" size="40" maxlength="300" />
                </div>
            </div>

             <!-- REAL ESTATE LEGAL DESCRIPTION -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_legal_desc_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <textarea rows="2" cols="50" name="val[legal_desc]">{$data.legal_desc}</textarea>
                </div>
            </div>


            <!-- REAL ESTATE ROOM COUNT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_roomno_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <select name="val[no_of_rooms]" style="width:200px;" class="dropdown_style_small">
                        <option value="">{phrase var='admincp.realstate_roomno_select'}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                    </select>
                </div>
            </div>
            <div class="clear"></div>
            <!-- REAL ESTATE BATHROOM COUNT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_bathroomno_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <select name="val[no_of_bathrooms]" style="width:200px;" class="dropdown_style_small">
                        <option value="">{phrase var='admincp.realstate_bathroom_select'}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="clear"></div>

            <!-- REAL ESTATE PARCEL NO -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {phrase var='admincp.admincp_realstate_parcel_no_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_small" name="val[parcel_no]" value="{$data.parcel_no}" id="total" size="40" maxlength="100" />
                </div>
            </div>
            <div class="clear"></div>

            <!-- REAL ESTATE PER FLOOR SQUARE FOOT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.admincp_realstate_per_floor_sqft_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_small" name="val[per_floor_sqft]" value="{$data.per_floor_sqft}" id="total" size="40" maxlength="100" /> $
                </div>
            </div>
            <div class="clear"></div>


            <!-- REAL ESTATE TOTAL SQUARE FOOT -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_sqfoot_label'}:
                </div>

                <div class="table_right table_right_custom">
                    <input type="text" class="textbox_style_small" name="val[total_square_foot]" value="" id="total" size="40" maxlength="100" /> sq.ft
                </div>
            </div>
            <div class="clear"></div>
            <!-- REAL ESTATE PURPOSE -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}{phrase var='admincp.realstate_purpose_label'}:
                </div>

                <div class="table_right table_right_custom">


                    <div class="item_is_active_holder item_is_active_holder_custom">
                        <span class="js_item_active item_is_active item_is_active_custom" onclick="showDiv('is_rent');"><input type="radio" name="val[is_rent]" value="1" {value type='radio' id='is_rent' default='1'} /> {phrase var='admincp.realstate_rent_label'}</span>
                        <span class="js_item_active item_is_not_active item_is_not_active_custom" onclick="showDiv('is_sale');"><input type="radio" name="val[is_sale]" value="0" {value type='radio' id='is_sale' default='0'} /> {phrase var='admincp.realstate_sale_label'}</span>
                    </div>

                    <div id="rent_div">
                        <input type="text" class="textbox_style_small" name="val[price_per_month]" value="" id="total" size="40" maxlength="100" />$ /month
                    </div>

                    <div id="sale_div">
                        <input type="text" class="textbox_style_small" name="val[total_price]" value="" id="total" size="40" maxlength="100" />$
                    </div>


                </div>
            </div>
            <div class="clear"></div>

            <!-- REAL ESTATE MAP -->
            <div class="table">
                <div class="table_left table_left_custom">
                    {required}Select location:
                </div>

                <div class="table_right table_right_custom">
                <div id="content"> 
                    <div id="mapCanvas"></div>
                    <div id="displaycsv" style="display:none;"></div>
                </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="clear"></div>


            <div class="table_clear table_clear_custom">
                <input type="submit" value="{phrase var='admincp.realestate_add_submit'}" class="button" />
            </div>

        </div>
    </div>
</form>
{/if}