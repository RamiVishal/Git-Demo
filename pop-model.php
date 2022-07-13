


<div class="sticklist">
    <button class="open-close-arrow">
      <span class="open-arrow"><i class="fas fa-chevron-right"></i></span>
      <span class="close-arrow"><i class="fas fa-chevron-left"></i></span>
    </button>
    <ul>
      <li class="none-li inquiery-icon  imgnone">
        <a href="#" class="click1">
          <span class="icon1"> <i class="fa-solid fa-envelope"></i></span> <span class="btn-text"> Send Inquiry</span>
        </a>
      </li>
      <li class="download-pdf none-li inquiery-icon  imgnone">
        <a href="tel:#number#" onclick="gtag('event', 'send', { 'event_category': 'click on Mobile', 'event_action': 'Mobile', 'event_label': '#number#' });" >
          <span class="icon"> <i class="fas fa-phone"></i></span> <span class="btn-text">Call</span>
        </a>
      </li>
      <li class="whataspp-icon none-li imgnone">
            <a onclick="gtag('event', 'send', { 'event_category': 'click on whatsapp', 'event_action': 'Mobile', 'event_label': '#number#' });" href="https://api.whatsapp.com/send?phone=#number#&amp;text=Welcome To #name# Please Send Your Requirement For Better Assistance" target="_blank">
                <span class="icon"> <i class="fab fa-whatsapp"></i></span> <span class="btn-text"> Whatsapp</span></a>
        </li>
    </ul>
  </div>
  <div class="modal fade bs-example-modal-sm cstm-modal-top-header my-custom-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="onload">
    <div class="modal-dialog modal-lg">
      <input type="hidden" id="ispopupopen" value="1">
      <div class="modal-content">
        <div class="modal-body stick_popup">
          <h5 class="modal-title">Get Your Free Quote…!</h5>
          <div class="stick_close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></div>
          <div class="row mt-40">
            <div class="col-md-5 col-sm-12 col-xs-12">
              <div class="logo-wrapper">
                <img src="./assets/images/Sevitsil-header-logo.png">
                <button class="btn-modal-gra">
                  <a class="content-p" href="mailto:" #email#" onclick="gtag('event', 'send', { 'event_category': 'click on mail', 'event_action': 'mailto', 'event_label': '#email#' });"><b>#email#</b></a> <br> <a class="content-p" href="tel:#number#" onclick="gtag('event', 'send', { 'event_category': 'click on Mobile', 'event_action': 'Mobile', 'event_label': '#number#' });"><b>#number#</b></a>
                </button>
              </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">


              <div class="widget footer-widgets tag-widget">
                <input id="inquiery-model" value="<?= $_COOKIE['inquierymodel']; ?>" type="hidden" />
                <input id="isloadopenmodel" value="<?= $_COOKIE['isloadopenmodel']; ?>" type="hidden" />

                <input name="junk_trap" class="junk_trap" type="hidden" />

                <form class="form-horizontal form1" action="inquiry-action.php" method="post" novalidate="novalidate">
                  <div class="form-group has-feedback">
                    <div class="col-md-12">
                      <input name="name" id="name" type="text" placeholder="Name" class="form-control">

                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <div class="col-md-12">
                      <input name="email" id="email" type="text" placeholder="E-Mail Address" class="form-control">

                    </div>
                  </div>
                  <div class="form-group has-feedback class-feedback">

                    <div class="col-md-12">

                      <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12 mybottom">

                          <select id="country" name="country" class="form-control" style="color: #999;">
                          <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
                         </select>

                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-4 mybottom" style="display: none;">
                          <select name="code" id="state" class="form-control" style="padding-right: 0;color: #999;">
                            <option value="">+00</option>
                          </select>

                        </div>

                      </div>

                    </div>

                  </div>
                  <div class="form-group has-feedback">
                    <div class="col-md-12">
                      <input name="number" id="number" type="tel" placeholder="Phone" maxlength="15" minlength="10" class="form-control number21">

                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <div class="col-md-12">
                      <textarea class="form-control" name="message" id="message" placeholder="Requirement"></textarea>

                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-8 col position-relative">
                          <input name="captcha" id="captcha" placeholder="Captcha Code" class="form-control" type="text">

                        </div>
                        <div class="col-md-4 col">
                          <img src="captcha.php" class="capside">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <div class="col-md-12 col-sm-3 col-xs-12">
                      <input name="submit" class="submit submitbutton" type="submit" value="Submit Now!">
                    </div>
                  </div>
                </form>

              </div>

            </div>

          </div>

        </div>

        <div class="clearfix"></div>

      </div>

      <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>

  </div>

  <!-- End My Model -->

  <div class="footer-box" style="display: none;">
    <div class="book-app" style="background:#b22f35;" id="req-apnmt2">
      <a class="nav_up click1" href="javascript:;" style="color:#FFF; font-size:12px;font-weight:600;"><i class="fa-solid fa-envelope" style="margin-right: 5px;"></i> Enquire Now</a>
    </div>
    <div class="book-app" style="background: #d4b071;">
    <a class="nav_up" href="tel:#number#" onclick="gtag('event', 'send', { 'event_category': 'click on Mobile', 'event_action': 'Mobile', 'event_label': '#number#' });" style="color:#FFF; font-size:12px;font-weight:600;"><i class="fas fa-phone" style="margin-right: 5px;"></i> Call</a>

    </div>

  </div>


  <!-- End My Model -->