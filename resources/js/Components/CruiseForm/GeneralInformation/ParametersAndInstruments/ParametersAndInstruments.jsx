import { columns } from "./TableData/Columns";
import Table from "../../../BaseComponents/Table/Table";
import Spinner from "../../../BaseComponents/Spinner/Spinner";
import { useState, useEffect } from "react";
import styles from "../../CruiseForm.module.css";
import { useFormContext, Controller } from "react-hook-form";
import StaticDataService from "../../../../api/StaticDataService";

const ParametersAndInstruments = () => {
  const [instruments, setInstruments] = useState([]);
  const [staticParameters, setStaticParameters] = useState([]);
  const [staticInstruments, setStaticInstruments] = useState([]);
  const [isLoaded, setIsLoaded] = useState(false);

  const { setValue, getValues } = useFormContext();
  const service = StaticDataService();

  const updateParameters = (rows) => {
    const rowVals = rows.map((row) => row.values);
    setValue("general.parameters", rowVals);
  };

  const updateInstruments = (rows) => {
    const rowVals = rows.map((row) => row.values);
    setValue("general.instruments", rowVals);
  };

  const loadTableData = async () => {
    await service
      .loadAllSeaScapeParameters()
      .then((res) => {
        const params = res.data.data.map((p) => {
          return {
            id: p.id,
            code: p.code,
            label: p.label,
          };
        });
        setStaticParameters(params);
      })
      .catch((err) => {
        console.log(err.message);
      });
    await service.loadAllInstruments().then((res) => {
      const params = res.data.data.map((p) => {
        return {
          id: p.id,
          code: p.code,
          label: p.label,
        };
      });
      setStaticInstruments(params);
    });
    setIsLoaded(true);
  };
  useEffect(() => {
    loadTableData();
  }, []);

  return (
    <>
      {!isLoaded ? (
        <Spinner />
      ) : (
        <div className={`${styles["cruise-table"]}`}>
          <Table
            cols={columns}
            data={staticParameters}
            title="Parameters"
            displayFields={["code", "label"]}
            displayRows={getValues("general.parameters")}
            setDisplayRows={updateParameters}
          ></Table>
          <Table
            cols={columns}
            data={staticInstruments}
            title="Instruments"
            displayFields={["code", "label"]}
            displayRows={getValues("general.instruments")}
            setDisplayRows={updateInstruments}
          ></Table>
        </div>
      )}
    </>
  );
};
export default ParametersAndInstruments;
