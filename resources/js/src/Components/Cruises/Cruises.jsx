import { Routes, Route, Navigate } from "react-router-dom";
import CruiseReport from "../CruiseReport/CruiseReport";
const Cruises = () => {
  return (
    <div className="d-block">
      <Routes>
        <Route path="/" element={<h2>Home</h2>} />
        <Route path="/about" element={<h2>About</h2>} />
        <Route path="/cruise-report/*" element={<CruiseReport />} />
        <Route
          path="/cruise-report"
          element={<Navigate to="/cruise-report/identification" />}
        />
        <Route path="/gallery" element={<h2>Gallery</h2>} />
        <Route path="/contact" element={<h2>Contact</h2>} />
      </Routes>
    </div>
  );
};
export default Cruises;
