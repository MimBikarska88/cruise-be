import { useState, useEffect } from "react";
import { useFormContext, Controller } from "react-hook-form";

import Select from "react-select";
import TextInput from "../../../BaseComponents/TextInput/TextInput";
import TextArea from "../../../BaseComponents/TextArea/TextArea";
import styles from "../../../CruiseForm/CruiseForm.module.css";
import Spinner from "../../../BaseComponents/Spinner/Spinner";
import StaticDataService from "../../../../api/StaticDataService";

const Platform = () => {
  const service = StaticDataService();
  const [platformCategories, setPlatformCategories] = useState([]);
  const [isLoaded, setIsLoaded] = useState(false);
  const [selectedCategory, setSelectedCategory] = useState({
    id: undefined,
    definition: "",
    label: "",
    code: "",
    name: "",
  });
  const { ...form } = useFormContext();

  useEffect(() => {
    service
      .loadAllPlatformCategories()
      .then((res) => {
        setPlatformCategories(res.data.data);
        setIsLoaded(true);
      })
      .catch((err) => console.log(err));
  }, []);

  useEffect(() => {
    form.setValue("general.platformCategory", selectedCategory);
  }, [selectedCategory]);
  return (
    <>
      {!isLoaded ? (
        <Spinner />
      ) : (
        <div className={`container mt-3 ${styles["cruise-info"]}`}>
          <div className="row mb-5">
            <div className="col mt-1">
              <label className="pt-4">Platform Name*</label>
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
              />
            </div>
            <div className="col pt-3">
              <div className="d-flex">
                <div className="w-25 d-inline-block mr-3">
                  <TextInput label="Code" name="platformCode" disabled />
                </div>
                <div className="w-75 d-inline-block">
                  <TextInput label="Name" name="platformName" disabled />
                </div>
              </div>
            </div>
          </div>
          <div className="row-mb-7">
            <div className="col pl-0 mt-1">
              <label className="pt-4">Platform Category</label>
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
                options={platformCategories.map((category) => {
                  if (!category.label) return;
                  return {
                    value: category,
                    label: category.label,
                  };
                })}
                onChange={(e) => setSelectedCategory(e.value)}
              />
            </div>
          </div>
          <div className="row mb-7">
            <div className="col-sm-6">
              <div className="pt-3">
                <TextInput
                  name="platformCategoryCode"
                  label="Code"
                  disabled={true}
                  value={selectedCategory.code}
                />
              </div>
            </div>
            <div className="col-sm-6">
              <div className="pt-3">
                <TextInput
                  name="platformCategoryName"
                  label="Name"
                  disabled={true}
                  value={selectedCategory.label}
                />
              </div>
            </div>
          </div>
          <div className="row-mb-7">
            <div className="pt-3">
              <TextArea
                name="platformCategoryDefinition"
                label="Definition"
                disabled={true}
                value={selectedCategory.definition}
              />
            </div>
          </div>
        </div>
      )}
    </>
  );
};
export default Platform;
