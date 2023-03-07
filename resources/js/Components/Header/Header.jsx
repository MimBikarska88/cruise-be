import logo from "../../assets/img/logo-IO-BAS-small.png";
import Navigation from "./Navigation";
import styles from "./Header.module.css";
const Header = () => {
  return (
    <div className="banner-area default-header" id="home">
      <nav className="navbar navbar-expand-lg  navbar-light">
        <div className="container">
          <a className="navbar-brand d-inline-flex" href="index.html">
            <img src={logo} alt="io-bas-logo" />
          </a>
          <button
            className="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="text-white lnr lnr-menu"></span>
          </button>
          <div className="d-grid col">
            <div className={`d-grid row ${styles["row"]}`}>
              Institute of Oceanology "Fridtjof Nansen"
            </div>
            <div className={`d-grid row ${styles["row"]}`}>
              Bulgarian Academy of Science
            </div>
          </div>

          <Navigation />
        </div>
      </nav>
    </div>
  );
};
export default Header;
