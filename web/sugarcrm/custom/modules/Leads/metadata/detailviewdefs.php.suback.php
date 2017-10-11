<?php
// created: 2010-07-27 13:20:29
$viewdefs['Leads']['DetailView'] = array (
  'templateMeta' => 
  array (
    'preForm' => '<form name="vcard" action="index.php"><input type="hidden" name="entryPoint" value="vCard"><input type="hidden" name="contact_id" value="{$fields.id.value}"><input type="hidden" name="module" value="Leads"></form>',
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'DUPLICATE',
        2 => 'DELETE',
        3 => 
        array (
          'customCode' => '<input title="{$MOD.LBL_CONVERTLEAD_TITLE}" accessKey="{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'" name="convert" value="{$MOD.LBL_CONVERTLEAD}">',
        ),
        4 => 
        array (
          'customCode' => '<input title="{$APP.LBL_DUP_MERGE}" accessKey="M" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Step1\'; this.form.module.value=\'MergeRecords\';" type="submit" name="Merge" value="{$APP.LBL_DUP_MERGE}">',
        ),
        5 => 
        array (
          'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
        ),
      ),
      'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
    ),
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'modules/Leads/Lead.js',
      ),
    ),
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'assistant',
          'label' => 'LBL_ASSISTANT',
        ),
        1 => 
        array (
          'name' => 'posted_by_c',
          'label' => 'LBL_POSTED_BY',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'last_name',
          'label' => 'LBL_LAST_NAME',
        ),
        1 => 
        array (
          'name' => 'age_c',
          'label' => 'LBL_AGE',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'gender_c',
          'label' => 'LBL_GENDER',
        ),
        1 => 
        array (
          'name' => 'height_c',
          'label' => 'LBL_HEIGHT',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'marital_status_c',
          'label' => 'LBL_MARITAL_STATUS',
        ),
        1 => 
        array (
          'name' => 'religion_c',
          'label' => 'LBL_RELIGION',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'mother_tongue_c',
          'label' => 'LBL_MOTHER_TONGUE',
        ),
        1 => 
        array (
          'name' => 'caste_c',
          'label' => 'LBL_CASTE',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'education_c',
          'label' => 'LBL_EDUCATION',
        ),
        1 => 
        array (
          'name' => 'occupation_c',
          'label' => 'LBL_OCCUPATION',
        ),
      ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'income_c',
          'label' => 'LBL_INCOME',
        ),
        1 => 
        array (
          'name' => 'manglik_c',
          'label' => 'LBL_MANGLIK',
        ),
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'email1',
          'label' => 'LBL_EMAIL_ADDRESS',
        ),
        1 => 
        array (
          'name' => 'do_not_email_c',
          'label' => 'LBL_DO_NOT_EMAIL',
        ),
      ),
      8 => 
      array (
        0 => 
        array (
          'name' => 'phone_home',
          'label' => 'LBL_HOME_PHONE',
        ),
        1 => 
        array (
          'name' => 'phone_mobile',
          'label' => 'LBL_MOBILE_PHONE',
        ),
      ),
      9 => 
      array (
        0 => 
        array (
          'name' => 'do_not_call',
          'label' => 'LBL_DO_NOT_CALL',
        ),
        1 => 
        array (
          'name' => 'primary_address_street',
          'label' => 'LBL_PRIMARY_ADDRESS',
        ),
      ),
      10 => 
      array (
        0 => 
        array (
          'name' => 'primary_address_postalcode',
          'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
        ),
        1 => 
        array (
          'name' => 'city_c',
          'label' => 'LBL_CITY',
        ),
      ),
      11 => 
      array (
        0 => 
        array (
          'name' => 'campaign_name',
          'label' => 'LBL_CAMPAIGN',
        ),
        1 => 
        array (
          'name' => 'lead_source',
          'label' => 'LBL_LEAD_SOURCE',
        ),
      ),
      12 => 
      array (
        0 => 
        array (
          'name' => 'type_c',
          'label' => 'LBL_TYPE',
        ),
        1 => 
        array (
          'name' => 'edition_date_c',
          'label' => 'LBL_EDITION_DATE',
        ),
      ),
      13 => 
      array (
        0 => 
        array (
          'name' => 'response_ad_c',
          'label' => 'LBL_RESPONSE_AD',
        ),
        1 => 
        array (
          'name' => 'strength_c',
          'label' => 'LBL_STRENGTH',
        ),
      ),
      14 => 
      array (
        0 => 
        array (
          'name' => 'product_c',
          'label' => 'LBL_PRODUCT',
        ),
        1 => 
        array (
          'name' => 'product_value_c',
          'label' => 'LBL_PRODUCT_VALUE',
        ),
      ),
      15 => 
      array (
        0 => 
        array (
          'name' => 'status',
          'label' => 'LBL_STATUS',
        ),
        1 => 
        array (
          'name' => 'expect_pay_in_c',
          'label' => 'LBL_EXPECT_PAY_IN',
        ),
      ),
      16 => 
      array (
        0 => 
        array (
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO',
        ),
        1 => 
        array (
          'name' => 'username_c',
          'label' => 'LBL_USERNAME',
        ),
      ),
      17 => 
      array (
        0 => 
        array (
          'name' => 'date_modified',
          'label' => 'LBL_DATE_MODIFIED',
          'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
        ),
        1 => 
        array (
          'name' => 'created_by',
          'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}&nbsp;',
          'label' => 'LBL_DATE_ENTERED',
        ),
      ),
      18 => 
      array (
        0 => 
        array (
          'name' => 'have_photo_c',
          'label' => 'LBL_HAVE_PHOTO',
        ),
        1 => 'opportunity_amount',
      ),
      19 => 
      array (
        0 => 
        array (
          'customCode' => '<a href="#" onclick="window.open(\'list_matches.php?id={$fields.id.value}\',\'\',\'width=800,height=800,resizable=1,scrollbars=1\');">Click here to see matches sent to this lead</a>',
        ),
        1 => 
        array (
          'name' => 'refered_by',
          'label' => 'LBL_REFERED_BY',
        ),
      ),
      20 => 
      array (
        0 => 'birthdate',
      ),
    ),
  ),
);
?>
