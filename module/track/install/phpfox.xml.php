<module>
	<data>
		<module_id>track</module_id>
		<product_id>phpfox</product_id>
		<is_core>0</is_core>
		<is_active>1</is_active>
		<is_menu>0</is_menu>
		<menu />
		<phrase_var_name />
		<writable />
	</data>
	<blocks>
		<block type_id="0" m_connection="blog.view" module_id="track" component="recent-views" location="3" is_active="1" ordering="1" disallow_access="" can_move="0">
			<title>Recently Viewed By</title>
			<source_code />
			<source_parsed />
		</block>
		<block type_id="0" m_connection="profile.index" module_id="track" component="recent-views" location="3" is_active="1" ordering="6" disallow_access="" can_move="1">
			<title><![CDATA[{phrase var=&#039;track.recently_viewed_by&#039;}]]></title>
			<source_code />
			<source_parsed />
		</block>
		<block type_id="0" m_connection="blog.index" module_id="track" component="recent-views" location="3" is_active="1" ordering="6" disallow_access="" can_move="0">
			<title>Recent Visitors</title>
			<source_code />
			<source_parsed />
		</block>
		<block type_id="0" m_connection="quiz.profile" module_id="track" component="recent-views" location="1" is_active="1" ordering="2" disallow_access="" can_move="0">
			<title></title>
			<source_code />
			<source_parsed />
		</block>
	</blocks>
	<hooks>
		<hook module_id="track" hook_type="component" module="track" call_name="track.component_block_recent_views_process" added="1231838390" version_id="2.0.0alpha1" />
		<hook module_id="track" hook_type="component" module="track" call_name="track.component_block_recent_views_clean" added="1231838390" version_id="2.0.0alpha1" />
		<hook module_id="track" hook_type="service" module="track" call_name="track.service_track___construct" added="1231838390" version_id="2.0.0alpha1" />
		<hook module_id="track" hook_type="service" module="track" call_name="track.service_track___call" added="1231838390" version_id="2.0.0alpha1" />
		<hook module_id="track" hook_type="service" module="track" call_name="track.service_process__call" added="1231838390" version_id="2.0.0alpha1" />
		<hook module_id="track" hook_type="controller" module="track" call_name="track.component_controller_index_clean" added="1244973584" version_id="2.0.0beta4" />
		<hook module_id="track" hook_type="service" module="track" call_name="track.service_callback__call" added="1244973584" version_id="2.0.0beta4" />
	</hooks>
	<components>
		<component module_id="track" component="recent-views" m_connection="" module="track" is_controller="0" is_block="1" is_active="1" />
	</components>
	<phrases>
		<phrase module_id="track" version_id="2.0.0alpha1" var_name="recently_viewed_by" added="1213418447">Recently Viewed By</phrase>
		<phrase module_id="track" version_id="2.0.0rc4" var_name="recent_visitors" added="1255345958">Recent Visitors</phrase>
		<phrase module_id="track" version_id="2.0.0rc4" var_name="recent_views" added="1255345989">Recent Views</phrase>
	</phrases>
</module>