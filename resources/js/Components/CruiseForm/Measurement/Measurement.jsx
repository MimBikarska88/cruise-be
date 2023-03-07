import { useState, useEffect } from "react";
import { useFormContext } from "react-hook-form";

import SimpleTable from "../../BaseComponents/SimpleTable/SimpleTable";
import StaticDataService from "../../../api/StaticDataService";
import Button from "../../BaseComponents/Button/Button";
import MeasurementForm from "./MeasurementForm/MeasurementForm";
import styles from "./Measurement.module.css";
import Spinner from "../../BaseComponents/Spinner/Spinner";

const Measurement = (props) => {
  const service = StaticDataService();

  const { setValue } = useFormContext();

  const [visibleTable, setVisibleTable] = useState(true);

  const [visibleForm, setVisibleForm] = useState(false);

  const [measurements, setMeasurements] = useState([]);

  const [units, setUnits] = useState([]);

  const [dataTypes, setDataTypes] = useState([]);

  const [isLoaded, setIsLoaded] = useState(false);

  const Cancel = () => {
    setVisibleTable(true);
    setVisibleForm(false);
  };

  const openForm = () => {
    setVisibleTable(false);
    setVisibleForm(true);
  };

  const removeMeasurement = (e, index) => {
    setMeasurements((current) => current.filter((o, i) => i !== index));
  };
  const mapMeasurementsToTableData = () => {
    return measurements.map((measurement, index) => {
      const row = [
        <i
          className={`fa fa-trash mr-2 ${styles.trash}`}
          onClick={(e) => removeMeasurement(e, index)}
        ></i>,
        measurement.description,
        measurement.dataType.label,
        measurement.individual.name,
        measurement.organization.name,
        measurement.dateTime.toString(),
        measurement.quantity,
        measurement.unit.label,
      ];
      return row;
    });
  };
  const SubmitForm = (measurement) => {
    setMeasurements((current) => [...current, measurement]);
    setVisibleForm(false);
    setVisibleTable(true);
  };

  const loadStaticData = async () => {
    await service
      .loadAllUnits()
      .then((res) => {
        setUnits(res.data.data);
      })
      .catch((err) => console.log(err));
    await service
      .loadAllBioIndicators()
      .then((res) => {
        setDataTypes(res.data.data);
      })
      .catch((err) => console.log(err));
    setIsLoaded(true);
  };
  useEffect(() => {
    loadStaticData();
  }, []);

  useEffect(() => {
    setValue("measurement", measurements);
  }, [measurements]);
  return (
    <>
      {!isLoaded ? (
        <Spinner />
      ) : (
        <>
          <div className="d-block">
            {visibleTable && (
              <>
                <div className="d-block mb-5 text-center">
                  {measurements.length === 0 ? (
                    <h5>No measurement data inserted.</h5>
                  ) : (
                    <h5>Measurement</h5>
                  )}
                  <Button
                    value={"Add new record"}
                    onClick={openForm}
                    className="d-block"
                  />
                </div>
                <SimpleTable
                  headers={[
                    "",
                    "Description",
                    "Data Type",
                    "Individual Name",
                    "Organization",
                    "Date Time",
                    "Quantity",
                    "Unit",
                  ]}
                  data={mapMeasurementsToTableData()}
                />
              </>
            )}
          </div>
          {visibleForm && (
            <MeasurementForm
              units={units}
              Cancel={Cancel}
              SubmitForm={SubmitForm}
              dataTypes={dataTypes}
            />
          )}
        </>
      )}
    </>
  );
};
export default Measurement;
