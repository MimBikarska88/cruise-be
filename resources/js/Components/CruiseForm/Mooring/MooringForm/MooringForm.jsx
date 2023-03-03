/**
 * External Dependencies.
 */
import { useState } from "react";

/**
 * Internal Dependencies.
 */
import Select from "react-select";
import TextInput from "../../../BaseComponents/TextInput/TextInput";
import TextArea from "../../../BaseComponents/TextArea/TextArea";
import Button from "../../../BaseComponents/Button/Button";

const MooringForm = (props) => {
  const { dataTypes, individuals, organizations } = props;

  const { SubmitForm, Cancel } = props;

  const [selectedDataType, setSelectedDataType] = useState({
    value: { id: 0, code: "" },
    label: "",
  });
  const [dateTime, setDateTime] = useState("");

  const [selectedIndividual, setSelectedIndividual] = useState({
    value: { id: 0, name: "" },
    label: "",
  });

  const [selectedOrganization, setSelectedOrganization] = useState({
    value: { id: 0, name: "" },
    label: "",
  });

  const [coordinates, setCoordinates] = useState({
    latitude: 0.0,
    longitude: 0.0,
  });

  const [description, setDescription] = useState("");

  const updateDateTime = (e) => {
    setDateTime(e.target.value.toString());
  };

  const resetInitialStates = () => {
    setSelectedDataType({
      value: { id: 0, code: "" },
      label: "",
    });
    setDateTime("");
    setSelectedIndividual({
      value: { id: 0, name: "" },
      label: "",
    });
    setSelectedOrganization({
      value: { id: 0, name: "" },
      label: "",
    });
    setCoordinates({
      latitude: 0.0,
      longitude: 0.0,
    });
  };

  const handleDescriptionChange = (e) => {
    setDescription(e.target.value);
  };
  const handleSubmit = (e) => {
    const mooring = {
      coordinates: coordinates,
      dataType: selectedDataType.value,
      individual: selectedIndividual.value,
      dateTime: dateTime,
      description: description.toString(),
      organization: selectedOrganization.value,
    };
    SubmitForm(mooring);
    resetInitialStates();
  };
  return (
    <>
      <div style={{ color: "black" }} className="d-block">
        <h4 className="text-center">Moorings</h4>
        <div className="d-grid">
          <div className="row">
            <div className="col mt-2">
              <label className="pb-1">Data Type</label>
              <Select
                theme={(theme) => ({
                  ...theme,
                  borderRadius: 0,
                  colors: {
                    ...theme.colors,
                    primary25: "#007bffed",
                    primary: "black",
                  },
                })}
                isSearchable
                options={dataTypes.map((dataType) => {
                  return { value: dataType, label: dataType.label };
                })}
                defaultValue={selectedDataType}
                onChange={setSelectedDataType}
              />
            </div>
            <div className="col">
              <TextInput
                value={selectedDataType.value.code}
                name="cruiseReportMooringDataType"
                label="Code"
                disabled
              />
            </div>
          </div>
          <div className="row">
            <div className="col-sm-4 mt-3">
              <TextInput
                value={dateTime}
                name="cruiseReportMooringDateTime"
                label="Date Time"
                onChange={updateDateTime}
                type="datetime-local"
              />
            </div>
          </div>
          <div className="row">
            <div className="mt-4 col-sm-6">
              <h5 className="mt-3 mb-2">Principal Investigator</h5>
              <label>Individual Name</label>
              <Select
                theme={(theme) => ({
                  ...theme,
                  borderRadius: 0,
                  colors: {
                    ...theme.colors,
                    primary25: "#007bffed",
                    primary: "black",
                  },
                })}
                onChange={setSelectedIndividual}
                options={individuals.map((individual) => {
                  return {
                    value: individual,
                    label: individual.name,
                  };
                })}
              />
            </div>
          </div>
          <div className="row mt-4">
            <div className="col mt-2">
              <label className="pb-1">Organization List</label>
              <Select
                theme={(theme) => ({
                  ...theme,
                  borderRadius: 0,
                  colors: {
                    ...theme.colors,
                    primary25: "#007bffed",
                    primary: "black",
                  },
                })}
                isSearchable
                options={organizations.map((organization) => {
                  return { value: organization, label: organization.label };
                })}
                onChange={setSelectedOrganization}
              />
            </div>
            <div className="col">
              <TextInput
                disabled
                name="organizationName"
                label="OrganizationName"
              />
            </div>
          </div>
          <div className="row mt-4">
            <div className="col">
              <TextInput
                type="number"
                step="0.0001"
                label="Latitude"
                value={coordinates.latitude}
                onChange={(e) =>
                  setCoordinates((prevState) => ({
                    ...prevState,
                    latitude: e.target.value,
                  }))
                }
              />
            </div>
            <div className="col">
              <TextInput
                type="number"
                step="0.0001"
                label="Latitude"
                value={coordinates.longitude}
                onChange={(e) =>
                  setCoordinates((prevState) => ({
                    ...prevState,
                    longitude: e.target.value,
                  }))
                }
              />
            </div>
          </div>
          <div className="row">
            <div className="col-12">
              <TextArea
                label="Description"
                onChange={handleDescriptionChange}
                placeholder="Provide description ..."
              />
            </div>
          </div>
          <div className="row mt-4">
            <div className="d-flex justify-content-center">
              <Button value="Save" className="mr-2" onClick={handleSubmit} />
              <Button value="Cancel" onClick={Cancel} />
            </div>
          </div>
        </div>
      </div>
    </>
  );
};
export default MooringForm;
