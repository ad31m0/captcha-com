<?php

// Instances of the Captcha type can be created on your PHP forms and will take
// care of Captcha display and validation.
class SimpleCaptcha {

  public $m_CaptchaConfiguration;
  public $m_CaptchaPersistence;

  private $m_CaptchaBase;
  private $m_UserInputID;
  private $m_ImageTooltip;
  private $m_SoundTooltip;
  private $m_ReloadTooltip;
  private $m_HelpLinkText;
  private $m_HelpLinkUrl;
  private $m_ReloadEnabled;
  private $m_UseSmallIcons;
  private $m_UseHorizontalIcons;
  private $m_SoundIconUrl;
  private $m_ReloadIconUrl;
  private $m_IconsDivWidth;
  private $m_TabIndex;
  private $m_AdditionalCssClasses;
  private $m_AdditionalInlineCss;
  private $m_AddCssInclude;
  private $m_AddScriptInclude;
  private $m_AddInitScriptInclude;
  private $m_AutoUppercaseInput;
  private $m_AutoFocusInput;
  private $m_AutoClearInput;
  private $m_AutoReloadExpiredCaptchas;
  private $m_AutoReloadTimeout;
  private $m_SoundStartDelay;
  private $m_RemoteScriptEnabled;
  private $m_ImageColorMode;
  private $m_HandlerUrl;
  private $m_BaseUrl;
  private $m_P;


  const DefaultCaptchaStyleName = "defaultCaptcha";
  const TabIndexNotSet = -255;


  // constructor
  public function __construct($p_CaptchaStyleName = self::DefaultCaptchaStyleName, $p_CaptchaId = null) {
    if (!BDC_StringHelper::hasValue($p_CaptchaStyleName)) {
      return null;
    }

    $captchaFileConfigManager = new BDC_SimpleCaptchaFileConfigurationManager();
    $captchaFileConfig = $captchaFileConfigManager->LoadConfig();
    $this->m_CaptchaConfiguration = new BDC_SimpleCaptchaConfiguration($captchaFileConfig, $p_CaptchaStyleName);
    $persistenceProvider = $this->m_CaptchaConfiguration->GetPersistenceProvider();
    $this->m_CaptchaPersistence = new SimpleCaptchaPersistence($persistenceProvider);

    $this->m_CaptchaBase = new BDC_SimpleCaptchaBase($p_CaptchaStyleName, $this->m_CaptchaConfiguration, $persistenceProvider, $p_CaptchaId);

    $this->m_UserInputID = $this->m_CaptchaConfiguration->GetUserInputID();

    $this->m_ImageTooltip = $this->m_CaptchaConfiguration->GetImageTooltip();
    $this->m_SoundTooltip = $this->m_CaptchaConfiguration->GetSoundTooltip();
    $this->m_ReloadTooltip = $this->m_CaptchaConfiguration->GetReloadTooltip();
    $this->m_HelpLinkText = $this->m_CaptchaConfiguration->GetHelpLinkText();
    $this->m_HelpLinkUrl = $this->m_CaptchaConfiguration->GetHelpLinkUrl();

    $this->m_ReloadEnabled = $this->m_CaptchaConfiguration->IsReloadEnabled();
    $this->m_UseSmallIcons = $this->m_CaptchaConfiguration->IsUseSmallIcons();
    $this->m_UseHorizontalIcons = $this->m_CaptchaConfiguration->IsUseHorizontalIcons();
    $this->m_SoundIconUrl = $this->m_CaptchaConfiguration->GetSoundIconUrl();
    $this->m_ReloadIconUrl = $this->m_CaptchaConfiguration->GetReloadIconUrl();
    $this->m_IconsDivWidth = $this->m_CaptchaConfiguration->GetIconsDivWidth();
    $this->m_TabIndex = -255;
    
    $this->m_AdditionalCssClasses = $this->m_CaptchaConfiguration->GetAdditionalCssClasses();
    $this->m_AdditionalInlineCss = $this->m_CaptchaConfiguration->GetAdditionalInlineCss();
    $this->m_AddCssInclude = $this->m_CaptchaConfiguration->IsAddCssInclude();

    $this->m_AddScriptInclude = $this->m_CaptchaConfiguration->IsAddScriptInclude();
    $this->m_AddInitScriptInclude = $this->m_CaptchaConfiguration->IsAddInitScriptInclude();
    $this->m_AutoUppercaseInput = $this->m_CaptchaConfiguration->IsAutoUppercaseInput();
    $this->m_AutoFocusInput = $this->m_CaptchaConfiguration->IsAutoFocusInput();
    $this->m_AutoClearInput = $this->m_CaptchaConfiguration->IsAutoClearInput();
    $this->m_AutoReloadExpiredCaptchas = $this->m_CaptchaConfiguration->IsAutoReloadExpiredCaptchas();
    $this->m_AutoReloadTimeout = $this->m_CaptchaConfiguration->GetAutoReloadTimeout();
    $this->m_SoundStartDelay = $this->m_CaptchaConfiguration->GetSoundStartDelay();
    $this->m_RemoteScriptEnabled = $this->m_CaptchaConfiguration->IsRemoteScriptEnabled();
    $this->m_BaseUrl = $this->m_CaptchaConfiguration->GetBaseUrl();
    
    $this->m_ImageColorMode = $this->m_CaptchaConfiguration->GetImageColorMode();
    
    $this->m_HandlerUrl = $this->m_BaseUrl . $this->m_CaptchaConfiguration->GetHandlerUrl();
  }

  /* getter/ setter captcha setting*/
  public function get_CaptchaBase() {
    return $this->m_CaptchaBase;
  }

  public function get_CaptchaPersistence() {
    return $this->m_CaptchaPersistence;
  }

  public function get_CaptchaConfiguration() {
    return $this->m_CaptchaConfiguration;
  }

  public function get_CurrentCaptchaId() {
    return $this->m_CaptchaBase->CaptchaId;
  }
  
  public function get_UserInputID() {
    return $this->m_UserInputID;
  }

  public function set_SoundEnabled($p_Enabled) {
    $this->m_CaptchaBase->SoundEnabled = $p_Enabled;
  }

  public function IsLimitSoundRegeneration() {
    return (SoundRegenerationMode::Limited == $this->SoundRegenerationMode);
  }

  public function get_ImageTooltip() {
    if (BDC_StringHelper::HasValue($this->m_ImageTooltip)) { // user-set value
      return $this->m_ImageTooltip;
    } else { // default value
      return $this->m_CaptchaBase->Localization->ImageTooltip;
    }
  }

  public function get_SoundTooltip() {
    // change the icon tooltip when the sound package is missing
    if ($this->SoundPackageMissing && $this->m_CaptchaConfiguration->isWarnAboutMissingSoundPackages()) {
      return "<em>Captcha sound is enabled, but the pronunciation sound package required for the current locale can not be found.</em> \n<em>To enable Captcha sound for this locale, please deploy the appropriate sound package to the <code>\\lib\\botdetect\\Resources\\Sounds\\</code> folder of the BotDetect PHP Captcha library. For example, use <code>Pronunciation_English_GB.bdsp</code> for British English Captcha sounds.</em> \n<em>To disable this warning and remove the sound icon for the current Captcha locale, set <code>\$BotDetect->WarnAboutMissingSoundPackages = false;</code> in the <code>CaptchaConfig.php</code> file. To remove the sound icon for all locales, simply set <code>\$BotDetect->SoundEnabled = false;</code>.</em>";
    }

    if (BDC_StringHelper::HasValue($this->m_SoundTooltip)) { // user-set value
      return $this->m_SoundTooltip;
    } else { // default value
      return $this->m_CaptchaBase->Localization->SoundTooltip;
    }
  }

  public function get_CaptchaSoundAvailable() {
    return BDC_SoundGeneratorFacade::IsPronunciationAvailable($this->m_CaptchaBase->Localization);
  }

  public function get_SoundPackageMissing() {
    return ($this->SoundEnabled && !$this->CaptchaSoundAvailable);
  }

  public function get_ReloadTooltip() {
    if (BDC_StringHelper::HasValue($this->m_ReloadTooltip)) { // user-set value
      return $this->m_ReloadTooltip;
    } else { // default value
      return $this->Localization->ReloadTooltip;
    }
  }

  // Text or tooltip of the Captcha help link, depending on help link mode.
  // The default value depends on the width of the Captcha image.
  // Valid user Captcha help link setting values are strings at least 4 characters
  // long.
  public function get_HelpLinkText() {
    if (BDC_StringHelper::HasValue($this->m_HelpLinkText)) { // user-set value
      return BDC_HelpLinkHelper::GetHelpLinkText($this->m_HelpLinkText, $this->ImageWidth);
    } else { // default value
      return BDC_HelpLinkHelper::GetDefaultText($this->ImageWidth);
    }
  }

  // Url of the localized Captcha help page the help link points to.
  // The default value depends on Captcha locale.
  // Valid user Captcha help link url setting values are absolute or relative Urls.
  // This setting is only supported in licensed versions of BotDetect.
  public function get_HelpLinkUrl() {
    if (BDC_CaptchaBase::IsFree) { //PREPROCESSTODO_FREE_START
      BDC_HelpLinkHelper::GetDefaultUrl($this->Localization);
      //PREPROCESSTODO_FREE_END
    }

    if (!BDC_CaptchaBase::IsFree) { //PREPROCESSTODO_ENTERPRISE_START
      if (BDC_StringHelper::HasValue($this->m_HelpLinkUrl)) { // user-set value
        return BDC_HelpLinkHelper::GetHelpLinkUrl($this->m_HelpLinkUrl, $this->Localization);
      } else { // default value
        return BDC_HelpLinkHelper::GetDefaultUrl($this->Localization);
      }
      //PREPROCESSTODO_ENTERPRISE_END
    }
  }

  // Is Captcha reloading (changing the Captcha code because the current one is
  // too hard to read) enabled.
  // The default value is true.
  // Valid user Captcha reload enabled setting values are booleans.
  // Requesting a new Captcha challenge on the current form requires client-side
  // scripting, so the reload icon is only shown in browsers that have JavaScript
  // enabled. When JavaScript is disabled or unsupported, the visitor can still
  // get a different Captcha challenge by reloading the form.
  public function get_ReloadEnabled() {
    return $this->m_ReloadEnabled;
  }

  public function get_RenderIcons() {
    return ($this->SoundEnabled || $this->ReloadEnabled);
  }

  public function get_UseSmallIcons() {
    if (is_bool($this->m_UseSmallIcons)) { // user-set value
      return $this->m_UseSmallIcons;
    } else { // default value
      return ($this->ImageHeight < 50);
    }
  }

  public function get_UseHorizontalIcons() {
    if (is_bool($this->m_UseHorizontalIcons)) { // user-set value
      return $this->m_UseHorizontalIcons;
    } else { // default value
      return ($this->ImageHeight < 40);
    }
  }

  // Url of the optional custom Captcha sound icon that will be used instead of
  // the default one.
  // The default value is 'botdetect/public/bdc_sound_icon.gif'.
  // Valid user Captcha sound icon setting values are absolute or relative Urls.
  // When specifying a custom Captcha sound icon, you should make sure its
  // filename includes "icon", and also provide a disabled variation of the icon
  // that will be shown during sound playback (to prevent the user from clicking
  // the icon multiple times). The disabled sound icon variant should be the same
  // size and have a filename based on the active one ("icon" replaced with
  // "disabled_icon").
  public function get_SoundIconUrl() {
    $iconUrl = null;

    if (BDC_StringHelper::HasValue($this->m_SoundIconUrl)) { // user set icon url
      $iconUrl = $this->m_SoundIconUrl;
    } else { // default icon url
      $iconUrl = SimpleCaptchaUrls::DefaultSoundIconUrl($this->HandlerUrl);
      // only default icons are reduced in size automatically
      if ($this->UseSmallIcons) {
        $iconUrl = SimpleCaptchaUrls::SmallIconUrl($iconUrl);
      }
    }
    // change the icon when the sound package is missing
    if ($this->SoundPackageMissing && $this->m_CaptchaConfiguration->isWarnAboutMissingSoundPackages()) {
      $iconUrl = SimpleCaptchaUrls::DisabledIconUrl($iconUrl);
    }
    return $iconUrl;
  }

  // Url of the optional custom Captcha reload icon that will be used instead of
  // the default one.
  // The default value is 'botdetect/public/bdc_reload_icon.gif'.
  // Valid user Captcha reload icon setting values are absolute or relative Urls.
  // When specifying a custom Captcha reload icon, you should make sure its
  // filename includes "icon", and also provide a disabled variation of the icon
  // that will be shown while the browser is waiting to fetch a new Captcha
  // challenge from the server (to prevent the user from clicking the icon
  // multiple times). The disabled reload icon variant should be the same size
  // and have a filename based on the active one ("icon" replaced with
  // "disabled_icon").
  public function get_ReloadIconUrl() {
    $iconUrl = null;
    if (BDC_StringHelper::HasValue($this->m_ReloadIconUrl)) { // user set icon url
      $iconUrl = $this->m_ReloadIconUrl;
    } else { // default icon url
      $iconUrl = SimpleCaptchaUrls::DefaultReloadIconUrl($this->HandlerUrl);
      // only default icons are reduced in size automatically
      if ($this->UseSmallIcons) {
        $iconUrl = SimpleCaptchaUrls::SmallIconUrl($iconUrl);
      }
    }
    return $iconUrl;
  }

  // Custom width of the Captcha icons div element.
  // The default value depends on Captcha image height, since BotDetect will
  // automatically determine default icon size and position to match it.
  // Valid user Captcha icons div width setting values are positive integers.
  // If your custom Captcha icons are not of the same size as the default
  // BotDetect ones (22x22 px), the UseHorizontalIcons setting won't be able to
  // control the icon layout correctly. You can control whether your custom icons
  // will be displayed one beneath the other or one beside the other by setting
  // an appropriate icons div width: setting it to at least twice the icon width
  // + 8px of padding will result in horizontal icon layout, while smaller values
  // will result in vertical icon layout.
  public function get_IconsDivWidth() {
    if (is_int($this->m_IconsDivWidth) && (0 < $this->m_IconsDivWidth)) {
      return $this->m_IconsDivWidth;
    } else {
      if ($this->UseHorizontalIcons) {
        return 2 * $this->get_IconSizeDefault() + 4 * BDC_CaptchaDefaults::IconSpacing;
      } else {
        return $this->get_IconSizeDefault() + BDC_SimpleCaptchaDefaults::IconSpacing;
      }
    }
  }

  // width of the CaptchaIconsDiv element, affecting icon layout
  public function get_IconSizeDefault() {
    if ($this->UseSmallIcons) {
      return BDC_SimpleCaptchaDefaults::SmallIconSize;
    } else {
      return BDC_SimpleCaptchaDefaults::IconSize;
    }
  }

  // Url of the localized Captcha help page the help link points to.
  // The default value depends on Captcha locale.
  // Valid user Captcha help link url setting values are absolute or relative Urls.
  // This setting is only supported in licensed versions of BotDetect.
  public function get_HelpLinkEnabled() {
    if (BDC_CaptchaBase::IsFree) { //PREPROCESSTODO_FREE_START
      return true;
      //PREPROCESSTODO_FREE_END
    }
    if (!BDC_CaptchaBase::IsFree) { //PREPROCESSTODO_ENTERPRISE_START
      return $this->m_CaptchaBase->HelpLinkEnabled;
      //PREPROCESSTODO_ENTERPRISE_END
    }
  }

  protected function GetAdjustedHeight() {
    return ($this->m_CaptchaBase->ImageHeight - BDC_SimpleCaptchaBase::HelpLinkHeight);
  }

  protected function GetHelpLinkHeight() {
    return BDC_SimpleCaptchaBase::HelpLinkHeight;
  }

  protected function GetHelpLinkFontSize() {
    return BDC_SimpleCaptchaBase::HelpLinkHeight - 1;
  }

  public function get_TabIndex() {
    return $this->m_TabIndex;
  }

  private function set_TabIndex($p_Index) {
    $this->m_TabIndex = $p_Index;
  }

  public function IsTabIndexSet() {
    return (self::TabIndexNotSet != $this->m_TabIndex);
  }

  // User-defined CSS classes that will be added to the BotDetect CAPTCHA
  // container <div>.
  // The default value is empty.
  // Valid user additional Css classes setting values are strings containing
  // desired class names in standard space-delimited CSS class format.
  // CSS style declarations for these custom classes must be defined in a user
  // stylesheet added to the page.
  public function get_AdditionalCssClasses() {
    return $this->m_AdditionalCssClasses;
  }

  // User-defined CSS style declarations that will be added as inline style
  // of the BotDetect CAPTCHA container <div>.
  // The default value is empty.
  // Valid user additional Css style setting values are strings containing
  // desired CSS style declarations in standard semicolon-delimited CSS style format.
  public function get_AdditionalInlineCss() {
    return $this->m_AdditionalInlineCss;
  }

  // need check
  public function get_AddCssInclude() {
    return $this->m_AddCssInclude;
  }


  // calculated width of the Captcha container <div>, based on Captcha
  // image width and should the icons be rendered or not
  public function get_TotalWidth() {
    $width = $this->ImageWidth;
    if ($this->RenderIcons) {
      $width = $width + 3 * BDC_SimpleCaptchaDefaults::IconSpacing + $this->get_IconsDivWidth();
    }
    return $width;
  }

  // calculated height of the Captcha container <div>, based on Captcha image height
  public function get_TotalHeight() {
    return $this->ImageHeight;
  }

  // Should the BotDetect JavaScript client-side script code be included by the
  // generated Captcha container markup.
  // The default value is true.
  // Valid user add script include setting values are booleans.
  // This setting will usually only be set to false if you have multiple Captcha
  // instances on the same form and only want the first one's markup to include
  // the required BotDetect client-side code. Another possible use is when you
  // manually add the necessary <script> include to page <head>, possibly combined
  // with other JavaScript code and minified to reduce the number of Http requests
  // made by the page.
  public function get_AddScriptInclude() {
    return $this->m_AddScriptInclude;
  }

  public function get_ScriptIncludeUrl() {
    return SimpleCaptchaUrls::ScriptIncludeUrl($this->HandlerUrl);
  }

  public function GetScriptIncludeMarkup() {
    return BDC_HtmlHelper::scriptInclude($this->ScriptIncludeUrl);
  }

  public function GetInitScriptIncludeMarkup() {
    return BDC_HtmlHelper::scriptInclude(SimpleCaptchaUrls::CaptchaInitScriptIncludeUrl($this->HandlerUrl, $this->CaptchaStyleName, $this->CurrentCaptchaId));
  }

  // Should the JavaScript code for BotDetect client-side object creation be
  // included in the generated Captcha container markup.
  // The default value is true.
  // Valid user add init script setting values are booleans.
  // Adding the initialization script fragment should be turned off only if you
  // will manually add the necessary <script> code to form <head> for example.
  public function get_AddInitScriptInclude() {
    return $this->m_AddInitScriptInclude;
  }

  public function get_HandlerUrl() {
    return $this->m_HandlerUrl;
  }

  public function getBaseUrl() {
    return $this->m_BaseUrl;
  }

  // Should user Captcha code input be automatically uppercased on the fly.
  // The default value is true.
  // Valid user auto uppercase input setting values are booleans.
  // Since Captcha validation is not and should not be case-sensitive (it would
  // hinder human visitors more than bots, and how would case differences be
  // communicated through audio Captcha in all supported pronunciation languages?),
  // automatically uppercasing user input is a small usability improvement that
  // helps communicate the case-insensitivity of the Captcha challenge to users.
  public function get_AutoUppercaseInput() {
    return $this->m_AutoUppercaseInput;
  }

  // Should the Captcha code input textbox automatically be assigned focus on
  // all Captcha sound and Captcha reload icon clicks, allowing the users to
  // more easily type in the code as they hear it or as the new image loads.
  // The default value is true.
  // Valid user Captcha auto focus input setting values are booleans.
  // Automatic input element focusing is not triggered by auto-reloading of
  // expired Captcha challenges, since the user might be filling out another
  // field on the form when the auto-reload starts and shouldn't be distracted.
  public function get_AutoFocusInput() {
    return $this->m_AutoFocusInput;
  }

  // Should the Captcha user input textbox automatically be cleared on all
  // reload icon clicks and auto-reloads of expired Captcha codes.
  // The default value is true.
  // Valid user auto clear input setting values are booleans.
  // Automatic input clearing is a small usability improvement: since any
  // previous user input will be invalidated by Captcha reloading, it helps so
  // users don't have to delete the previous input themselves.
  public function get_AutoClearInput() {
    return $this->m_AutoClearInput;
  }

  // Should Captcha challenges automatically be reloaded when the Captcha code
  // expires (controlled by the CodeTimeout property).
  // The default value is true.
  // Valid user auto reload expired Captchas setting values are booleans.
  // Automatic reloading of expired Captcha codes allows you to have a short
  // Captcha code timeout (e.g. 2 minutes) to narrow the window of opportunity
  // for Captcha reusing on other sites or human-solver-powered bots, and actual
  // visitors can still fill out your form at their own pace and without rushing
  // (since the Captcha image will be reloaded automatically when it is no longer
  // valid).
  public function get_AutoReloadExpiredCaptchas() {
    return $this->m_AutoReloadExpiredCaptchas;
  }

  // Time period in seconds after which automatic reloading of expired Captcha
  // challenges will cease.
  // The default value is 7200 seconds (2 hours).
  // Valid user auto reload timeout setting values are positive integers.
  // This timeout prevents indefinite extension of the visitor Session, when the
  // user leaves the form open in a background browser tab over the weekend for
  // example.
  public function get_AutoReloadTimeout() {
    return $this->m_AutoReloadTimeout;
  }

  // Starting delay (in miliseconds) of Captcha audio JavaScript playback.
  // The default value is 0 (no delay).
  // Valid user Captcha sound start delay setting values are positive integers.
  // An initial delay before browser sound playback can be useful for improving
  // usability of the Captcha audio for blind people using JAWS or similar screen
  // readers. Such assistive technology will read the label associated with the
  // Captcha code textbox and start sound playback simultaneously when the sound
  // icon is activated (since Captcha sound playing automatically focuses the
  // Captcha code textbox by default). Setting this delay to e.g. 2000 (2 seconds)
  // will give the user time to hear both the pronounced label and the Captcha
  // sound clearly.
  public function get_SoundStartDelay() {
    return $this->m_SoundStartDelay;
  }

  // Should BotDetect also add a remote JavaScript include
  // (remote.captcha.com/include.js) loaded from the captcha.com server (which is
  // currently used only for stats, but is planned to develop into additional
  // Captcha functionality).
  // The default value is true.
  // Valid user remote script enabled setting values are booleans.
  // This setting is only supported in licensed version of BotDetct.
  public function get_RemoteScriptEnabled() {
    if (BDC_CaptchaBase::IsFree) { //PREPROCESSTODO_FREE_START
      return BDC_SimpleCaptchaScriptsHelper::GetRemoteScriptEnabled(true);
      //PREPROCESSTODO_FREE_END
    }
    if (!BDC_CaptchaBase::IsFree) { //PREPROCESSTODO_ENTERPRISE_START
      return BDC_SimpleCaptchaScriptsHelper::GetRemoteScriptEnabled($this->m_RemoteScriptEnabled);
      //PREPROCESSTODO_ENTERPRISE_END
    }
  }

  public function get_CaptchaImageUrl() {
    return SimpleCaptchaUrls::CaptchaImageUrl($this->HandlerUrl, $this->CaptchaStyleName, $this->CurrentCaptchaId);
  }

  public function get_CaptchaSoundUrl() {
    return SimpleCaptchaUrls::CaptchaSoundUrl($this->HandlerUrl, $this->CaptchaStyleName, $this->CurrentCaptchaId);
  }

  public function get_ImageClientId() {
    return $this->CaptchaStyleName . "_CaptchaImage";
  }

  public function get_AudioPlaceholderClientId() {
    return $this->CaptchaStyleName . "_AudioPlaceholder";
  }

  public function get_ValidatingCaptchaIdKey() {
    return "BDC_VCID_" . $this->CaptchaStyleName;
  }

  public function get_ImageColorMode() {
    return $this->m_ImageColorMode;
  }
  
  public function IsHideCaptchaImage() {
    return ($this->m_ImageColorMode != ImageColorMode::None);
  }
  
  public function get_CaptchaImageStyleCss() {
    $style = "";
    if($this->IsHideCaptchaImage()) {
      $style = "display: none !important";
    }
    return $style;
  }


  /**
   * return CaptchaId of the previous Captcha instance that is being
   * submitted, set only if isSubmit is true
   */
  public function get_ValidatingCaptchaId() {
    return $_REQUEST[$this->ValidatingCaptchaIdKey];
  }

  private function get_P() {
    if($this->m_P == null) {
      $this->m_P = $this->CaptchaBase->P;
    }
    
    return $this->m_P;
  }

  public function IsJavaScriptRequired () {
    $required = $this->CaptchaBase->IsJavaScriptRequired();
    return $required;
  }

  /**
   * Clean expired CaptchaIds
   */
  public function Clear() {
    $this->m_CaptchaPersistence->getPersistenceProvider()->Clear();
  }

  /*  public function Save(SimpleCaptcha $p_Captcha)
    {
      $this->m_CaptchaPersistence->SaveCaptchaId($p_Captcha->CurrentCaptchaId);
    }*/

  public function SaveCode($p_CaptchaId, BDC_Code $p_Code) {
    $this->m_CaptchaPersistence->SaveCode($p_CaptchaId, $p_Code);
  }

  public function Save(SimpleCaptcha $p_Captcha) {
    if(!$p_Captcha->IsLocalNetwork() && $p_Captcha->IsJavaScriptRequired()) {
      $this->m_CaptchaPersistence->SaveP($p_Captcha->CurrentCaptchaId, $p_Captcha->get_P());
    }
  }
  public function Html() {
    //$this->Save($this);
    $this->Clear();
    $this->Save($this);
    
    $output = "";
    $this->RenderXhtml11Strict($output);

    return $output;
  }

  public function RenderXhtml11Strict(&$p_Writer) {
    if (!$this->CaptchaSoundAvailable && !$this->m_CaptchaConfiguration->isWarnAboutMissingSoundPackages()) {
      $this->SoundEnabled = false;
    }

    $p_Writer .= "\r\n";

    $this->RenderCssIncludes($p_Writer);

    $this->RenderWarnings($p_Writer);

    $p_Writer .= sprintf("  <div class=\"BDC_CaptchaDiv %s\" id=\"%s_CaptchaDiv\" style=\"width: %dpx !important; height: %dpx !important; %s\"><!--",
                         $this->AdditionalCssClasses, $this->CaptchaStyleName, $this->TotalWidth, $this->TotalHeight, $this->AdditionalInlineCss);
    $p_Writer .= "\r\n";

    $this->RenderCaptchaImageMarkup($p_Writer);
    $this->RenderCaptchaIcons($p_Writer);

    $this->RenderScriptIncludes($p_Writer);
    $this->RenderHiddenFields($p_Writer);

    $p_Writer .= "\r\n";
    $p_Writer .= "  </div>";
    $p_Writer .= "\r\n";
  }

  private function RenderWarnings(&$p_Writer) {
    $this->RenderTestModeWarning($p_Writer);
  }

  /**
   * We want to prevent accidental testMode SimpleCaptcha deployment to production websites
   */
  protected function RenderTestModeWarning(&$p_Writer) {
    if ($this->m_CaptchaConfiguration->IsTestModeEnabled()) {

      $p_Writer .= "<p class=\"BDC_Warning\">Test Mode Enabled</p>";
    }
  }

  protected function RenderCaptchaImageMarkup(&$p_Writer) {
    $p_Writer .= sprintf(" --><div class=\"BDC_CaptchaImageDiv\" id=\"%s_CaptchaImageDiv\" style=\"width: %dpx !important; height: %dpx !important;\"><!--",
                         $this->CaptchaStyleName, $this->ImageWidth, $this->ImageHeight);

    $p_Writer .= "\r\n";
    if (!$this->HelpLinkEnabled) {
      $this->RenderPlainImage($p_Writer);
    } else {
      switch ($this->HelpLinkMode) {
        case HelpLinkMode::Image:
          $this->RenderLinkedImage($p_Writer);
          break;

        case HelpLinkMode::Text:
          $this->RenderPlainImageWithTextLink($p_Writer);
          break;
      }

    }
    $p_Writer .= "\r\n";

    if ($this->RenderIcons) {
      $p_Writer .= " --></div><!--";
    } else {
      $p_Writer .= "  --></div>";
    }
  }

  protected function RenderPlainImage(&$p_Writer) {
    // plain image
    $p_Writer .= sprintf("   --><img class=\"BDC_CaptchaImage\" id=\"%s\" src=\"%s\" alt=\"%s\" style=\"%s\" /><!--",
                         $this->ImageClientId, ($this->CaptchaImageUrl), $this->ImageTooltip, $this->CaptchaImageStyleCss);
  }

  protected function RenderLinkedImage(&$p_Writer) {
    // image link to configured help page
    if ($this->IsTabIndexSet()) {
      $p_Writer .= sprintf("   --><a href=\"%s\" title=\"%s\" tabindex=\"%d\" id=\"%s_HelpLink\"><img class=\"BDC_CaptchaImage\" id=\"%s\" src=\"%s\" alt=\"%s\" style=\"%s\" /></a><!--",
                           $this->HelpLinkUrl, $this->HelpLinkText, $this->TabIndex, $this->CaptchaStyleName, $this->ImageClientId, $this->CaptchaImageUrl, $this->ImageTooltip, $this->CaptchaImageStyleCss);

      if ($this->TabIndex != -1) {
        $this->TabIndex = $this->TabIndex + 1;
      }
    } else {
      $p_Writer .= sprintf("   --><a href=\"%s\" title=\"%s\" id=\"%s_HelpLink\"><img class=\"BDC_CaptchaImage\" id=\"%s\" src=\"%s\" alt=\"%s\" style=\"%s\" /></a><!--",
                           $this->HelpLinkUrl, $this->HelpLinkText, $this->CaptchaStyleName, $this->ImageClientId, $this->CaptchaImageUrl, $this->ImageTooltip, $this->CaptchaImageStyleCss);
    }
  }

  protected function RenderPlainImageWithTextLink(&$p_Writer) {
    // image wrapped in an extra div
    $p_Writer .= sprintf("   --><div class=\"BDC_CaptchaImageDiv\" style=\"width:%dpx; height:%dpx;\"><img class=\"BDC_CaptchaImage\" id=\"%s\" src=\"%s\" alt=\"%s\" style=\"%s\" /></div><!--",
                         $this->ImageWidth, $this->GetAdjustedHeight(), $this->ImageClientId, $this->CaptchaImageUrl, $this->ImageTooltip, $this->CaptchaImageStyleCss);
    $p_Writer .= "\r\n";

    // + help link
    if ($this->IsTabIndexSet()) {
      $p_Writer .= sprintf("   --><a href=\"%s\" title=\"%s\" tabindex=\"%d\" style=\"display: block !important; height: %dpx !important; margin: 0 !important; padding: 0 !important; font-size: %dpx !important; line-height: %dpx !important; visibility: visible !important; font-family: Verdana, DejaVu Sans, Bitstream Vera Sans, Verdana Ref, sans-serif !important; vertical-align: middle !important; text-align: center !important; text-decoration: none !important; background-color: #f8f8f8 !important; color: #606060 !important;\">%s</a><!--",
                           $this->HelpLinkUrl, $this->HelpLinkText, $this->TabIndex, $this->GetHelpLinkHeight(), $this->GetHelpLinkFontSize(), $this->GetHelpLinkHeight(), $this->HelpLinkText);
      if ($this->TabIndex != -1) {
        $this->TabIndex = $this->TabIndex + 1;
      }
    } else {
      $p_Writer .= sprintf("   --><a href=\"%s\" title=\"%s\" style=\"display: block !important; height: %dpx !important; margin: 0 !important; padding: 0 !important; font-size: %dpx !important; line-height: %dpx !important; visibility: visible !important; font-family: Verdana, DejaVu Sans, Bitstream Vera Sans, Verdana Ref, sans-serif !important; vertical-align: middle !important; text-align: center !important; text-decoration: none !important; background-color: #f8f8f8 !important; color: #606060 !important;\">%s</a><!--",
                           $this->HelpLinkUrl, $this->HelpLinkText, $this->GetHelpLinkHeight(), $this->GetHelpLinkFontSize(), $this->GetHelpLinkHeight(), $this->HelpLinkText);
    }
  }

  /// Sound and Reload icons
  protected function RenderCaptchaIcons(&$p_Writer) {
    if ($this->RenderIcons) {
      $p_Writer .= "\r\n";
      $p_Writer .= sprintf(" --><div class=\"BDC_CaptchaIconsDiv\" id=\"%s_CaptchaIconsDiv\" style=\"width: %dpx !important;\"><!--",
                           $this->CaptchaStyleName, $this->IconsDivWidth);
      $p_Writer .= "\r\n";
    }


    // reload icon
    if ($this->ReloadEnabled) {
      if ($this->IsTabIndexSet()) {
        $p_Writer .= sprintf("   --><a class=\"BDC_ReloadLink\" id=\"%s_ReloadLink\" href=\"#\" tabindex=\"%d\" title=\"%s\"><img class=\"BDC_ReloadIcon\" id=\"%s_ReloadIcon\" src=\"%s\" alt=\"%s\" /></a><!--",
                             $this->CaptchaStyleName, $this->TabIndex, $this->ReloadTooltip, $this->CaptchaStyleName, $this->ReloadIconUrl, $this->ReloadTooltip);

        if ($this->TabIndex != -1) {
          $this->TabIndex = $this->TabIndex + 1;
        }
      } else {
        $p_Writer .= sprintf("   --><a class=\"BDC_ReloadLink\" id=\"%s_ReloadLink\" href=\"#\" title=\"%s\"><img class=\"BDC_ReloadIcon\" id=\"%s_ReloadIcon\" src=\"%s\" alt=\"%s\" /></a><!--",
                             $this->CaptchaStyleName, $this->ReloadTooltip, $this->CaptchaStyleName, $this->ReloadIconUrl, $this->ReloadTooltip);
      }
      $p_Writer .= "\r\n";
    }

    // sound icon
    if ($this->SoundEnabled) {
      if ($this->CaptchaSoundAvailable) {
        if ($this->IsTabIndexSet()) {
          $p_Writer .= sprintf("   --><a rel=\"nofollow\" class=\"BDC_SoundLink\" id=\"%s_SoundLink\" href=\"%s\" tabindex=\"%d\" title=\"%s\"><img class=\"BDC_SoundIcon\" id=\"%s_SoundIcon\" src=\"%s\" alt=\"%s\" /></a><!--",
                               $this->CaptchaStyleName, $this->CaptchaSoundUrl, $this->TabIndex, $this->SoundTooltip, $this->CaptchaStyleName, $this->SoundIconUrl, $this->SoundTooltip);
        } else {
          $p_Writer .= sprintf("   --><a rel=\"nofollow\" class=\"BDC_SoundLink\" id=\"%s_SoundLink\" href=\"%s\" title=\"%s\"><img class=\"BDC_SoundIcon\" id=\"%s_SoundIcon\" src=\"%s\" alt=\"%s\" /></a><!--",
                               $this->CaptchaStyleName, $this->CaptchaSoundUrl, $this->SoundTooltip, $this->CaptchaStyleName, $this->SoundIconUrl, $this->SoundTooltip);
        }
        $p_Writer .= "\r\n";
      } else if ($this->m_CaptchaConfiguration->isWarnAboutMissingSoundPackages()) {
        $p_Writer .= sprintf("   --><a target=\"_blank\" class=\"BDC_DisabledLink\" id=\"%s_SoundLink\" href=\"#\" tabindex=\"%d\"><img class=\"BDC_SoundIcon\" id=\"%s_SoundIcon\" src=\"%s\" alt=\"\" /><span>%s</span></a><!--",
                             $this->CaptchaStyleName, self::TabIndexNotSet, $this->CaptchaStyleName, $this->SoundIconUrl, $this->SoundTooltip);
        $p_Writer .= "\r\n";
      }
    }

    // invisible sound placeholder element
    if ($this->SoundEnabled) {
      $p_Writer .= sprintf("   --><div class=\"BDC_Placeholder\" id=\"%s\">&amp;nbsp;</div><!--",
                           $this->AudioPlaceholderClientId);
    }

    $p_Writer .= " --></div>";
  }

  protected function RenderScriptIncludes(&$p_Writer) {
    // BotDetect JS include link
    if ($this->AddScriptInclude) {
      $p_Writer .= "\r\n";
      $p_Writer .= $this->GetScriptIncludeMarkup();
    }

    // BotDetect JS Init include link
    if ($this->AddInitScriptInclude) {
      $p_Writer .= "\r\n";
      $p_Writer .= $this->GetInitScriptIncludeMarkup();
    }
  }

  protected function RenderCssIncludes(&$p_Writer) {
    if ($this->AddCssInclude) {
      $p_Writer .= "\r\n";
      $p_Writer .= "  " . BDC_HtmlHelper::StylesheetInclude(SimpleCaptchaUrls::LayoutStyleSheetUrl($this->HandlerUrl));
      $p_Writer .= "\r\n";
    }
  }

  protected function RenderHiddenFields(&$p_Writer) {
    $p_Writer .= "\r\n";
    $p_Writer .= BDC_HtmlHelper::HiddenField($this->ValidatingCaptchaIdKey, $this->CurrentCaptchaId);
    $p_Writer .= "\r\n";
    $p_Writer .= BDC_HtmlHelper::HiddenField("BDC_BackWorkaround_" . $this->CaptchaStyleName, "0");
    $p_Writer .= "\r\n";
    
    if(!$this->IsLocalNetwork() && $this->IsJavaScriptRequired()) {
      $p_Writer .= BDC_HtmlHelper::HiddenField("BDC_Hs_" . $this->CaptchaStyleName, $this->get_P()->GHs());
      $p_Writer .= "\r\n";
      $p_Writer .= BDC_HtmlHelper::HiddenField("BDC_SP_" . $this->CaptchaStyleName, $this->get_P()->GSP());
      $p_Writer .= "\r\n";
    }
  }

  /**
   * Validate the Captcha from a server-side call, using the specified
   * user input
   */
  public function Validate($p_UserInput = null, $p_CaptchaId = null) {
    if (!isset($p_UserInput) && array_key_exists($this->m_UserInputID, $_REQUEST)) {
      $p_UserInput = $_REQUEST[$this->m_UserInputID];
      $p_UserInput = trim($p_UserInput);
    }

    if (!isset($p_CaptchaId) && array_key_exists($this->get_ValidatingCaptchaIdKey(), $_REQUEST)) {
      $p_CaptchaId = $this->ValidatingCaptchaId;
    }
    
    $this->PreValidate($p_CaptchaId);
    return $this->m_CaptchaBase->Validate($p_UserInput, $p_CaptchaId, BDC_ValidationAttemptOrigin::Server, $this->IsLocalNetwork());
  }

  /**
   * Validate the Captcha from an Ajax call, using the specified
   * user input
   */
  public function AjaxValidate($p_UserInput = null, $p_CaptchaId = null) {
    if (!isset($p_UserInput) && array_key_exists($this->m_UserInputID, $_REQUEST)) {
      $p_UserInput = $_REQUEST[$this->m_UserInputID];
      $p_UserInput = trim($p_UserInput);
    }

    if (!isset($p_CaptchaId) && array_key_exists($this->get_ValidatingCaptchaIdKey(), $_REQUEST)) {
      $p_CaptchaId = $this->ValidatingCaptchaId;
    }

    $this->PreValidate($p_CaptchaId);
    return $this->m_CaptchaBase->Validate($p_UserInput, $p_CaptchaId, BDC_ValidationAttemptOrigin::Client, $this->IsLocalNetwork());
  }

  private function PreValidate($p_CaptchaId) {
    if(!$this->IsLocalNetwork() && $this->IsJavaScriptRequired()) {
      $this->m_CaptchaPersistence->LoadP($this->m_CaptchaBase, $p_CaptchaId);
    }
  }

  private function IsLocalNetwork() {
    return BDC_HttpHelper::IsLocalNetwork();
  }


  // license helper
  public static function IsFree() {
    return BDC_CaptchaBase::IsFree;
  }

  public static function LibInfo() {
    $info = '';
    $info .= BDC_CaptchaBase::$ProductInfo['name'] . ' version ' . BDC_CaptchaBase::$ProductInfo['version'];
    $info .= ' ' . (BDC_CaptchaBase::IsFree ? 'Free' : 'Enterprise');
    $info .= ' loaded by PHP version ' . PHP_VERSION;
    return $info;
  }


  // auto-magic helpers for civilized property access
  public function __get($name) {
    if (method_exists($this->m_CaptchaBase, ($method = 'get_' . $name))) {
      return $this->m_CaptchaBase->$method();
    } else if (method_exists($this, ($method = 'get_' . $name))) {
      return $this->$method();
    } else return;
  }

  public function __isset($name) {
    if (method_exists($this->m_CaptchaBase, ($method = 'isset_' . $name))) {
      return $this->m_CaptchaBase->$method();
    } else if (method_exists($this, ($method = 'isset_' . $name))) {
      return $this->$method();
    } else return;
  }

  public function __set($name, $value) {
    if (method_exists($this->m_CaptchaBase, ($method = 'set_' . $name))) {
      $this->m_CaptchaBase->$method($value);
    } else if (method_exists($this, ($method = 'set_' . $name))) {
      $this->$method($value);
    }
  }

  public function __unset($name) {
    if (method_exists($this->m_CaptchaBase, ($method = 'unset_' . $name))) {
      $this->m_CaptchaBase->$method();
    } else if (method_exists($this, ($method = 'unset_' . $name))) {
      $this->$method();
    }
  }

}