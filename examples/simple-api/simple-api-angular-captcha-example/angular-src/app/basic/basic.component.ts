import { Component, ViewChild } from '@angular/core';
import { Observable } from 'rxjs/Rx';

import { CaptchaComponent } from 'angular-captcha';

import { BasicService } from './basic.service';

@Component({
  moduleId: module.id,
  selector: 'basic-form',
  templateUrl: 'basic.component.html',
  styleUrls: ['basic.component.css'],
  providers: [BasicService]
})
export class BasicComponent {

  /**
   * Captcha validation messages.
   */
  errorMessages: string;
  successMessages: string;

  /**
   * BotDetect CAPTCHA component.
   */
  @ViewChild(CaptchaComponent) captchaComponent: CaptchaComponent;

  constructor(private basicService: BasicService) { }

  /**
   * Validate captcha at server-side.
   */
  validate(value, valid): void {

    if (!valid) {
      return;
    }

    let postData = {
      captchaCode: this.captchaComponent.captchaCode,
      captchaId: this.captchaComponent.captchaId
    }
  
    this.basicService.validateCaptcha(postData)
      .subscribe(
        response => {
          if (response.success) {
            // captcha, other form data passed and the data is also stored in database
            this.successMessages = 'Your message was sent successfully!';
            this.errorMessages = '';
          } else {
            // captcha validation failed at server-side
            this.errorMessages = 'CAPTCHA validation falied.';
            this.successMessages = '';
          }

          // always reload captcha image after validating captcha at server-side 
          // in order to update new captcha code for current captcha id
          this.captchaComponent.reloadImage();
        },
        error => {
          throw new Error(error);
        });
  }

}
