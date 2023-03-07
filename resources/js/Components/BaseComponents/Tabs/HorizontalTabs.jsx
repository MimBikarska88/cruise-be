/**
 * External Dependencies.
 */
import { useState } from "react";
import { Routes, Route, useNavigate, Navigate } from "react-router-dom";
/**
 * Internal Dependencies.
 */
import Button from "../Button/Button";
import styles from "../../CruiseForm/CruiseForm.module.css";

const HorizontalTabs = (props) => {
  const path = window.location.pathname;

  const { tabs = [] } = props;

  const navigate = useNavigate();

  const [activeTabIndex, setActiveTabIndex] = useState(0);

  const activateTab = (e, index) => {
    navigate(`${tabs[index].path}`);
    setActiveTabIndex(index);
  };
  return (
    <ul className="nav nav-tabs">
      {tabs.length > 0 && (
        <>
          <li>
            {tabs.map((tab, index) => (
              <Button
                key={index}
                onClick={(e) => activateTab(e, index)}
                className={` m-1 nav-item text-wrap w-10 ${
                  index === activeTabIndex ? "active" : ""
                }`}
                value={tab.name}
              />
            ))}
          </li>

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
                <Route path="*" element={<Navigate to="cruise" />}></Route>
                {tabs.map((t) => (
                  <Route
                    key={`${t.path}`}
                    path={`${t.path}`}
                    element={t.content}
                  ></Route>
                ))}
              </Routes>
            </div>
          </div>
        </>
      )}
    </ul>
  );
};

export default HorizontalTabs;
