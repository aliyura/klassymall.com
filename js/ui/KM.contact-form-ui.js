ayral.prepare(function(){
   var layer=Prepare('$contactFormPanel');
    
  if(sessionExist && user!=null){
      
    
    layer.render(`
        <div class="contact_form_title">Get in Touch</div>
        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
            <input type="text" value="`+user.name+`" name="sender-name" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
            <input type="email" value="`+user.email+`" name="sender-email" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
            <input type="text" value="`+user.mobile+`" maxlength="11" name="sender-number" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">
        </div>
        <div class="contact_form_text">
            <textarea   id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
        </div>
        <div class="contact_form_button">
            <button type="button" class="button contact_submit_button" name="sendMessage-trigger">Send Message</button>
        </div>
   `);
      
  }else{
      
    layer.render(`
        <div class="contact_form_title">Get in Touch</div>
        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
            <input type="text" name="sender-name" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
            <input type="email" name="sender-email" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
            <input type="text" name="sender-number" maxlength="11" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">
        </div>
        <div class="contact_form_text">
            <textarea   id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
        </div>
        <div class="contact_form_button">
            <button type="button" class="button contact_submit_button" name="sendMessage-trigger">Send Message</button>
        </div>
   `);  
  }
    
});