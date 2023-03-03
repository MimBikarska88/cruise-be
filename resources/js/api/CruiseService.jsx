import axios from "axios";
const CruiseService = () => {
  const path = "http://localhost:8000/api";
  const createCruise = (cruiseData) =>
    axios.post(`${path}/reports`, cruiseData);
  return {
    submitCruiseReport: createCruise,
  };
};
export default CruiseService;
