import { useState } from "react";
import OrganizationList from "../OrganizationList/OrganizationList";
import Centers from "../OrganizationCenter/Centers";

const CollateCenter = (props) => {
  const { organizations, setOrganizations, availableOrganizations, title } =
    props;
  const [visibleTable, setVisibleTable] = useState(true);
  const [visibleOrganizations, setVisibleOrganizations] = useState(false);
  const [currentOrganization, setCurrentOrganization] = useState({
    code: "",
    currentIndex: 0,
    id: 0,
    name: "",
    phone: "",
    fax: "",
    deliveryPoint: "",
    address: "",
    city: "",
    postalCode: "",
    country: "",
    email: "",
    website: "",
  });
  const addOrganizationToTable = () => {
    const organizationValue = JSON.parse(JSON.stringify(currentOrganization));
    console.log(organizations);
    if (!organizations.find((o) => o.id === organizationValue.id)) {
      setOrganizations([...organizations, organizationValue]);
    }
    closeOrganizationList();
  };

  const openOrganizationsList = () => {
    setVisibleTable(false);
    setVisibleOrganizations(true);
  };
  const closeOrganizationList = () => {
    setVisibleTable(true);
    setVisibleOrganizations(false);
  };

  const removeOrganization = (value) => {
    setOrganizations((current) => current.filter((o) => o.id !== value.id));
  };
  return (
    <>
      {visibleOrganizations && (
        <OrganizationList
          currentOrganization={currentOrganization}
          setCurrentOrganization={setCurrentOrganization}
          Organizations={availableOrganizations}
          closeListCancel={closeOrganizationList}
          closeListSave={addOrganizationToTable}
        ></OrganizationList>
      )}
      {visibleTable && (
        <Centers
          organizations={organizations}
          removeOrganization={removeOrganization}
          openOrganizationsList={openOrganizationsList}
          title={title}
        />
      )}
    </>
  );
};
export default CollateCenter;
