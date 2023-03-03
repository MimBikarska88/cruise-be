import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
import "bootstrap/dist/css/bootstrap.css";
import "./assets/css/bootstrap.css";
import "./assets/css/font-awesome.min.css";
import "./assets/css/jquery.DonutWidget.min.css";
import "./assets/css/jquerysctipttop.css";
import "./assets/css/linearicons.css";
import "./assets/css/magnific-popup.css";
import "./assets/css/nice-select.css";
import "./assets/css/owl.carousel.css";
import "./assets/css/main.css";

import { BrowserRouter } from "react-router-dom";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <BrowserRouter>
      <App />
    </BrowserRouter>
  </React.StrictMode>
);
