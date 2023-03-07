const Navigation = () => {
  return (
    <div
      className="collapse navbar-collapse justify-content-end align-items-center"
      id="navbarSupportedContent"
    >
      <ul className="navbar-nav">
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="/about">About</a>
        </li>
        <li>
          <a href="/cruise-report">Cruise Report</a>
        </li>
        <li>
          <a href="#">Gallery</a>
        </li>
        <li>
          <a href="#">Contact</a>
        </li>
      </ul>
    </div>
  );
};
export default Navigation;
