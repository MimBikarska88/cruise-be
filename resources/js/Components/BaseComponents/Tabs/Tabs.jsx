/**
 * External Dependencies.
 */
import { useState } from "react";
import { Routes, Route, useNavigate } from "react-router-dom";

/**
 * Internal Dependencies.
 */
import Button from "../Button/Button";
import styles from "./Tabs.module.css";

const Tabs = (props) => {
  const { tabs = [] } = props;

  const navigate = useNavigate();

  const [activeTabIndex, setActiveTabIndex] = useState(0);

  const activateTab = (e, index) => {
    navigate(`${tabs[index].path}`);
    setActiveTabIndex(index);
  };
  return (
    <div className="d-flex pt-3 align-items-start">
      {tabs.length > 0 && (
        <>
          <div>
            {tabs.map((tab, index) => (
              <Button
                key={index}
                onClick={(e) => activateTab(e, index)}
                className={`form-btn m-3 nav-link ${
                  index === activeTabIndex ? "active" : ""
                }`}
                value={tab.name}
              />
            ))}
          </div>

          <div
            className={`tab-content ml-4 col-lg-9 ${styles["tabs-border"]}`}
            id="v-pills-tabContent"
          >
            <div
              className="tab-pane fade show active"
              id="v-pills-home"
              role="tabpanel"
              aria-labelledby="v-pills-home-tab"
            >
              <Routes>
                {tabs.map((t) => (
                  <Route
                    key={`${t.path}`}
                    element={t.content}
                    path={`${t.path}`}
                  ></Route>
                ))}
              </Routes>
            </div>
          </div>
        </>
      )}
    </div>
  );
};

export default Tabs;
