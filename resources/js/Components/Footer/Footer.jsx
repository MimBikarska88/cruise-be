const Footer = () => {
  return (
    <div className="footer-area section-gap">
      <div className="container">
        <div className="row">
          <div className="col-lg-5 col-md-6 col-sm-6">
            <div className="single-footer-widget">
              <h6>About IO BAS</h6>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore dolore magna aliqua.
              </p>
              can't be removed. Template is licensed under CC BY 3.0.
              <p className="footer-text">
                Copyright &copy;{new Date().getFullYear()} All rights reserved
              </p>
            </div>
          </div>
          <div className="col-lg-5  col-md-6 col-sm-6">
            <div className="single-footer-widget">
              <h6>Newsletter</h6>
              <p>Stay update with our latest</p>
              <div className="" id="mc_embed_signup">
                <div className="d-flex flex-row">
                  <input className="form-control" type="email" />

                  <button className="click-btn btn btn-default">
                    <i
                      className="fa fa-long-arrow-right"
                      aria-hidden="true"
                    ></i>
                  </button>
                  <div style={{ position: "absolute", left: "-5000px" }}>
                    <input type="text" />
                  </div>

                  <div className="col-lg-4 col-md-4">
                    <button className="bb-btn btn">
                      <span className="lnr lnr-arrow-right"></span>
                    </button>
                  </div>
                </div>
                <div className="info"></div>
              </div>
            </div>
          </div>
          <div className="col-lg-2 col-md-6 col-sm-6 social-widget">
            <div className="single-footer-widget">
              <h6>Follow IO BAS</h6>
              <p>Let us be social</p>
              <div className="footer-social d-flex align-items-center">
                <a href="#">
                  <i className="fa fa-facebook"></i>
                </a>
                <a href="#">
                  <i className="fa fa-twitter"></i>
                </a>
                <a href="#">
                  <i className="fa fa-dribbble"></i>
                </a>
                <a href="#">
                  <i className="fa fa-behance"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};
export default Footer;
