import axios from "axios";
const CruiseService = () => {
  const createCruise = (cruiseData) =>
    axios.post(`/api/reports`, cruiseData);
  return {
    submitCruiseReport: createCruise,
  };
};
export default CruiseService;
