import { useState, useEffect } from "react";
import { useFormContext } from "react-hook-form";
import names from "../GeneralInformation.constants";
import OrganizationCenters from "../OrganizationCenter/OrganizationCenters";

const CollateCenter = () => {
  const [collateCenters, setCollateCenters] = useState([]);
  const { setValue } = useFormContext();
  useEffect(() => {
    setValue("general.collateCenters", collateCenters);
  }, [collateCenters]);
  return (
    <>
      <OrganizationCenters
        organizations={collateCenters}
        setOrganizations={setCollateCenters}
        availableOrganizations={names}
        title="Collate Centers"
      />
    </>
  );
};
export default CollateCenter;
