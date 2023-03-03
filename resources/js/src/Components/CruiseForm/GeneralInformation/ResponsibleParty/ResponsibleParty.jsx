import tableData from "./TableData/persons.json";
import { columns } from "./TableData/Columns";
import Table from "../../../BaseComponents/Table/Table";
import { useState, useEffect } from "react";
import { useFormContext, Controller } from "react-hook-form";
import styles from "../../CruiseForm.module.css";
import OrganizationCenters from "../OrganizationCenter/OrganizationCenters";
import names from "../GeneralInformation.constants";

const ResponsibleParty = () => {
  const [chiefScientists, setChiefScientists] = useState([]);
  const [cruiseLeaders, setCruiseLeaders] = useState([]);
  const [originatorCenters, setOriginatorCenters] = useState([]);

  const { setValue, getValues, control } = useFormContext();
  const updateChiefScientists = (rows) => {
    setChiefScientists(rows);
    setValue(
      "general.responsibleParty.chiefScientists",
      rows.map((r) => r.values)
    );
  };
  const updateCruiseLeaders = (rows) => {
    setCruiseLeaders(rows);
    setValue(
      "general.responsibleParty.cruiseLeaders",
      rows.map((r) => r.values)
    );
  };

  useEffect(() => {
    setValue("general.responsibleParty.originatorCenters", originatorCenters);
  }, [originatorCenters]);
  return (
    <>
      <div className={`${styles["cruise-table"]}`}>
        <Table
          cols={columns}
          data={tableData}
          title="Chief Scientists"
          displayFields={["first_name", "last_name"]}
          displayRows={getValues("general.responsibleParty.chiefScientists")}
          setDisplayRows={updateChiefScientists}
          delimeter={" "}
        ></Table>
        <Table
          cols={columns}
          data={tableData}
          title="Cruise Leaders"
          displayFields={["first_name", "last_name"]}
          displayRows={getValues("general.responsibleParty.cruiseLeaders")}
          setDisplayRows={updateCruiseLeaders}
          delimeter={" "}
        ></Table>
        <Controller
          control={control}
          name="general.responsibleParty.originatorCenters"
          render={({ field }) => (
            <OrganizationCenters
              organizations={field.value}
              setOrganizations={field.onChange}
              availableOrganizations={names}
              title="Originator Centers"
            />
          )}
        />
      </div>
    </>
  );
};
export default ResponsibleParty;
