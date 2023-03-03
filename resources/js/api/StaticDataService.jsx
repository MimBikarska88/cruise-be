import axios from "axios";

const StaticDataService = () => {
  const getSeaScapeParameters = () => axios.get(`/api/sea-scape-parameters`);

  const getInstruments = () => axios.get(`/api/instruments`);

  const getPlatformCategories = () => axios.get(`/api/platform-categories`);

  const getBioIndicators = () => axios.get(`/api/bio-indicators`);

  const getCountries = () => axios.get(`/api/countries`);

  const getUnits = () => axios.get(`/api/units`);

  const getDataAccessRestriction = () =>
    axios.get(`/api/data-access-restriction`);

  return {
    loadAllSeaScapeParameters: getSeaScapeParameters,
    loadAllInstruments: getInstruments,
    loadAllPlatformCategories: getPlatformCategories,
    loadAllBioIndicators: getBioIndicators,
    loadAllCountries: getCountries,
    loadAllUnits: getUnits,
    loadDataAccessRestriction: getDataAccessRestriction,
  };
};
export default StaticDataService;
