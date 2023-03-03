/**
 * External Dependencies.
 */
import { useForm, FormProvider } from "react-hook-form";

/**
 * Internal Dependencies.
 */
import Tabs from "../BaseComponents/Tabs/Tabs";
import Identification from "./Identification/Identification";
import GeneralInformation from "./GeneralInformation/GeneralInformation";
import Mooring from "./Mooring/Mooring";
import Measurement from "./Measurement/Measurement";
import Button from "../BaseComponents/Button/Button";
import CruiseService from "../../api/CruiseService";
const CruiseForm = () => {
  const service = CruiseService();

  const form = useForm({
    shouldUnregister: false,
    mode: "onChange",
    defaultValues: {
      identification: {
        cruiseId: "",
        cruiseName: "",
        creationDate: new Date().toISOString(),
        revisionDate: new Date().toISOString(),
        author: "",
      },
      general: {
        cruise: {
          startDate: "",
          endDate: "",
          countryOfDeparture: {},
          portOfDeparture: {},
          countryOfReturn: {},
          portOfReturn: {},
          dataAccessRestriction: {},
        },
        objectives: {
          purpose: "",
          project: "",
        },
        platformCategory: {},
        platform: {},
        parameters: [],
        instruments: [],
        collateCenters: [],
        responsibleParty: {
          cruiseLeaders: [],
          chiefScientists: [],
          originatorCenters: [],
        },
      },
      mooring: [],
      measurement: [],
    },
  });

  const values = form.watch();
  console.log(values);
  const onSubmit = (data) => {
    const cruise = {
      cruise_name: data.identification.cruiseName,
      creation_date: data.identification.creationDate,
      revision_date: data.identification.revisionDate,
      author: data.identification.author,
      period_start_date: data.general.cruise.startDate,
      period_end_date: data.general.cruise.endDate,
      port_of_departure: 1,
      country_of_return: data.general.cruise.countryOfReturn.id,
      country_of_departure: data.general.cruise.countryOfDeparture.id,
      port_of_return: 1,
      data_access_restriction: data.general.cruise.dataAccessRestriction.id,
      objectives: data.general.objectives.purpose,
      project_name: data.general.objectives.project,
      platform: 1,
      platform_category: data.general.platformCategory.id,
      comment: "comment",
    };
    console.log(cruise);
    service
      .submitCruiseReport(cruise)
      .then((res) => console.log("cruise created!"))
      .catch((err) => console.log(err));
  };
  return (
    <FormProvider {...form}>
      <form onSubmit={form.handleSubmit(onSubmit)}>
        <div className="d-grid p-4">
          <div className="row">
            <div className="col-1" style={{ marginTop: "2rem" }}>
              <Button className="ml-3" type="submit" value={"Submit"} />
            </div>
            <div className="col-11">
              <div className="d-block">
                <Tabs
                  title={"Tabs"}
                  tabs={[
                    {
                      name: "Identification",
                      content: <Identification />,
                      path: "identification",
                    },
                    {
                      name: "General Information",
                      content: <GeneralInformation />,
                      path: "general-information/*",
                    },
                    {
                      name: "Mooring",
                      content: <Mooring />,
                      path: "mooring",
                    },
                    {
                      name: "Measurement",
                      content: <Measurement />,
                      path: "measurement",
                    },
                    {
                      name: "Geographical Area",
                      content: <p>Hello there again again again</p>,
                      path: "geographical-area",
                    },
                    {
                      name: "Documentation",
                      content: <p>Hello there again again again</p>,
                      path: "documentation",
                    },
                  ]}
                />
              </div>
            </div>
          </div>
        </div>
      </form>
    </FormProvider>
  );
};
export default CruiseForm;
