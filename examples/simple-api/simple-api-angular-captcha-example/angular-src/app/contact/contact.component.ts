import { Component, ViewChild, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs/Rx';

import { CaptchaComponent } from 'angular-captcha';

import { Contact } from './contact.interface';
import { ContactService } from './contact.service';

@Component({
  moduleId: module.id,
  selector: 'contact-form',
  templateUrl: 'contact.component.html',
  styleUrls: ['contact.component.css'],
  providers: [ContactService]
})
export class ContactComponent implements OnInit {
  
  contact: FormGroup;

  emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  /**
   * Captcha validation messages.
   */
  errorMessages: Object;
  successMessages: string;

  /**
   * BotDetect CAPTCHA component.
   */
  @ViewChild(CaptchaComponent) captchaComponent: CaptchaComponent;

  constructor(
    private fb: FormBuilder,
    private contactService: ContactService
  ) { }

  ngOnInit(): void {
    this.contact = this.fb.group({
      name: ['', Validators.minLength(3)],
      email: ['', Validators.pattern(this.emailRegex)],
      subject: ['', Validators.minLength(10)],
      message: ['', Validators.minLength(10)],
      captchaCode: [''] // we use 'correctCaptcha' directive to validate captcha code control in the template
    });
  }

  send({ value, valid }: { value: Contact, valid: boolean }): void {
    if (!valid) {
      return;
    }

    let postData = value;
    // add captcha captcha id to postData for validating captcha at server-side
    postData['captchaId'] = this.captchaComponent.captchaId;

    this.contactService.send(postData)
      .subscribe(
        response => {
          if (response.success) {
            // captcha validation passed at server-side
            this.successMessages = 'CAPTCHA validation passed.';
            this.errorMessages = null;
          } else {
            // captcha validation failed at server-side
            this.errorMessages = response.errors;
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
