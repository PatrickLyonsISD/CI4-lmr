<footer class="section bg-footer">
  <div class="container">
    <div>
      <h6 class="footer-heading text-uppercase text-white">Information</h6>
      <ul class="footer-link mt-4">
        <li><a href="#!">Sitemap</a></li>
        <li><a href="#!">Our team</a></li>
        <li><a href="#!">Terms of Services</a></li>
      </ul>
    </div>
    <div>
      <h6 class="footer-heading text-uppercase text-white">Help</h6>
      <ul class="footer-link mt-4">
        <li><a href="#!">Register</a></li>
        <li><a href="#!">Sign in</a></li>
        <li><a href="#!">Privacy Policy</a></li>
      </ul>
    </div>
    <div class="footer-link">
      <h6 class="footer-heading text-uppercase text-white">Contact us</h6>
      <p class="contact-info mt-4">Need help ?</p>
      <p class="contact-info">+086 404 </p>
      <div>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#!"><i class="fab facebook footer-social-icon fa-facebook-f"></i></a></li>
          <li class="list-inline-item"><a href="#!"><i class="fab twitter footer-social-icon fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="#!"><i class="fab instagram footer-social-icon fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="text-center mt-5">
    <p class="footer-alt">2022 © TUS, All Rights Reserved</p>
  </div>
</footer>
<style>
 .container {
  margin-top: 2em;
  display: flex;
  justify-content: space-between;
}

h6 {
  margin-top: 0;
  margin-bottom: 0.5rem;
  font-weight: 500;
  line-height: 1.2;
  font-size: 1rem;
}

.text-uppercase {
  text-transform: uppercase;
}

.text-white {
  color: #fff;
}

.text-center {
  text-align: center;
}

.mt-4 {
      margin: 0;
  margin-top: 1.5rem;
}

.bg-footer {
  background-color: black;
  font-family: 'Raleway', sans-serif;
 
}

.footer-heading {
  letter-spacing: 2px;
  display: flex;
  justify-content: center;
}

.footer-link {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-left: 0;
  list-style: none;

  a {
      color: #ffffff;
    line-height: 40px;
    font-size: 16px;
    transition: all 0.2s;
    text-underline-offset: 4px;
    text-decoration-thickness: 2px;
  }
    &:hover {
      color: #E0952E;
    }
  
}

.list-inline {
  padding-left: 0;
  list-style: none;
  margin-top: 0;
  margin-bottom: 1rem;
}

.list-inline-item {
  &:not(:last-child) {
    margin-right: 0.5rem;
  }

  display: inline-block;
}

.contact-info {
  color: #acacac;
  font-size: 16px;
}

.footer-social-icon {
  font-size: 15px;
  height: 34px;
  width: 34px;
  line-height: 34px;
  border-radius: 3px;
  text-align: center;
  display: inline-block;
}

.facebook {
  transition: transform 1s ease 0s;
  background-color: #4e71a8;
  color: #ffffff;
}

.twitter {
  transition: transform 1s ease 0s;
  background-color: #55acee;
  color: #ffffff;
}

.instagram {
  transition: transform 1s ease 0s;
  background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
  color: #ffffff;
}

/* HOVER */

.facebook:hover, .twitter:hover, .instagram:hover {
  transform: rotate(360deg);
}

.footer-alt {
  color: #acacac;
}

.footer-heading {
  position: relative;
  padding-bottom: 12px;

  &:after {
    content: '';
    width: 25px;
    border-bottom: 1px solid #FFF;
    position: absolute;
    left: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    display: block;
    border-bottom: 3px solid #E0952E;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
    width: 100%;
    padding-right: var(--bs-gutter-x, 0.75rem);
    padding-left: var(--bs-gutter-x, 0.75rem);
    margin-right: auto;
    margin-left: auto;
  }
  
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}
    </style>