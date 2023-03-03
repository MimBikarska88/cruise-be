import Header from "../Header/Header";
import Cruises from "../Cruises/Cruises";
import Footer from "../Footer/Footer";
const Layout = () => {
  return (
    <>
      <header>
        <Header />
      </header>

      <main>
        <Cruises />
      </main>

      <footer>
        <Footer />
      </footer>
    </>
  );
};
export default Layout;
