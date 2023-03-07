import { useState, useEffect } from "react";
import { useFormContext } from "react-hook-form";

import SimpleTable from "../../BaseComponents/SimpleTable/SimpleTable";
import MooringForm from "./MooringForm/MooringForm";
import Spinner from "../../BaseComponents/Spinner/Spinner";
import StaticDataService from "../../../api/StaticDataService";
import Button from "../../BaseComponents/Button/Button";
import styles from "./Mooring.module.css";

const Mooring = () => {
  const service = StaticDataService();

  const { setValue } = useFormContext();

  const [moorings, setMoorings] = useState([]);

  const [formVisible, setFormVisible] = useState(false);

  const [tableVisible, setTableVisible] = useState(true);

  const [dataTypes, setDataTypes] = useState([]);

  const [individuals, setIndividuals] = useState([]);

  const [organizations, setOrganizations] = useState([]);

  const [isLoaded, setIsLoaded] = useState(false);

  const Cancel = () => {
    setFormVisible(false);
    setTableVisible(true);
  };

  const SubmitForm = (mooring) => {
    setMoorings((current) => [...current, mooring]);
    setFormVisible(false);
    setTableVisible(true);
  };

  const openForm = () => {
    setTableVisible(false);
    setFormVisible(true);
  };

  const removeMooring = (e, index) => {
    setMoorings((current) => current.filter((o, i) => i !== index));
  };
  const mooringToTableData = () => {
    return moorings.map((mooring, index) => {
      const row = [
        <i
          className={`fa fa-trash mr-2 ${styles.trash}`}
          onClick={(e) => removeMooring(e, index)}
        ></i>,
        mooring.description,
        mooring.coordinates.latitude,
        mooring.coordinates.longitude,
        mooring.dataType.label,
        mooring.individual.name,
        mooring.organization.name,
        mooring.dateTime.toString(),
      ];
      return row;
    });
  };
  useEffect(() => {
    service
      .loadAllBioIndicators()
      .then((res) => {
        setDataTypes(res.data.data);
        setIsLoaded(true);
      })
      .catch((err) => console.log(err));
  }, []);

  useEffect(() => {
    setValue("mooring", moorings);
  }, [moorings]);
  return (
    <>
      {!isLoaded ? (
        <Spinner />
      ) : (
        <>
          {tableVisible && (
            <>
              <div className="d-block mb-5 text-center">
                {moorings.length === 0 ? (
                  <h5>No mooring data inserted.</h5>
                ) : (
                  <h5>Moorings</h5>
                )}
                <Button
                  value={"Add new record"}
                  className="d-block"
                  onClick={openForm}
                />
              </div>
              <div className="d-block">
                <SimpleTable
                  headers={[
                    "",
                    "Description",
                    "Latitude",
                    "Longitude",
                    "DataType",
                    "Individual Name",
                    "Organization",
                    "Date Time",
                  ]}
                  data={mooringToTableData()}
                />
              </div>
            </>
          )}

          {formVisible && (
            <div className="d-block">
              <MooringForm
                Cancel={Cancel}
                dataTypes={dataTypes}
                organizations={organizations}
                individuals={individuals}
                SubmitForm={SubmitForm}
              />
            </div>
          )}
        </>
      )}
    </>
  );
};
export default Mooring;
// mooring table
