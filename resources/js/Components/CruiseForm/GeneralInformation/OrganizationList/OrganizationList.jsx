import styles from "../../CruiseForm.module.css";
import Button from "../../../BaseComponents/Button/Button";
import TextInput from "../../../BaseComponents/TextInput/TextInput";
import Table from "../../../BaseComponents/Table/Table";
const OrganizationList = ({
  Organizations = [],
  currentOrganization,
  setCurrentOrganization,
  closeListSave,
  closeListCancel,
}) => {
  return (
    <>
      <h3 className="mb-3 p-1 text-center">List of organizations</h3>
      <div className="container">
        <div className={`row`}>
          <div className="col">
            <div className="d-grid table-row">
              <div className="p-1 col">
                <div
                  className={`progress-table ${styles["organizations"]} ${styles["organizations-info"]}`}
                >
                  <div className="p-1 table-head">
                    <div className="country p-1">Name</div>
                  </div>
                  {Organizations.map((o, index) => (
                    <div
                      key={index}
                      className={`p-1 table-row ${styles["organization-names"]} `}
                      onClick={() =>
                        setCurrentOrganization(Organizations[index])
                      }
                    >
                      {o.name}
                    </div>
                  ))}
                </div>
              </div>
            </div>
          </div>
          <div className={`col ${styles["organizations-info"]}`}>
            <div className="ml-4">
              <h4 className="pb-2">Cited Responsible party</h4>
              <TextInput
                disabled={true}
                label="Organization Name"
                name={"organizationName"}
                value={currentOrganization.name}
                className={`${styles["single-input"]}`}
              />
              <TextInput
                disabled={true}
                label="Code"
                name={"organizationCode"}
                value={currentOrganization.code}
                className={`${styles["single-input"]}`}
              />
              <h4 className="pb-2">Contact Information</h4>
              <TextInput
                disabled={true}
                label="Phone"
                name={"organizationPhone"}
                value={currentOrganization.phone}
                className={`${styles["single-input"]}`}
              />
              <TextInput
                disabled={true}
                label="Fax"
                name={"organizationFax"}
                value={currentOrganization.fax}
                className={`${styles["single-input"]}`}
              />
              <h4 className="pb-2">Address</h4>
              <TextInput
                disabled={true}
                label="Delivery point"
                name={"organizationDeliveryPoint"}
                value={currentOrganization.deliveryPoint}
                className={`${styles["single-input"]}`}
              />
              <TextInput
                disabled={true}
                label="City"
                name={"organizationCity"}
                value={currentOrganization.city}
                className={`${styles["single-input"]}`}
              />
              <TextInput
                disabled={true}
                label="Postal Code"
                name={"organizationPostalCode"}
                value={currentOrganization.postalCode}
                className={`${styles["single-input"]}`}
              />
              <TextInput
                disabled={true}
                label="Country"
                name={"organizationCountry"}
                value={currentOrganization.country}
                className={`${styles["single-input"]}`}
              />
              <TextInput
                disabled={true}
                label="Email"
                name={"organizationEmail"}
                value={currentOrganization.email}
                className={`${styles["single-input"]}`}
              />
              <TextInput
                disabled={true}
                label="Website"
                name={"organizationWebSite"}
                value={currentOrganization.website}
                className={`${styles["single-input"]}`}
              />
            </div>
          </div>
        </div>
      </div>
      <div className="d-flex justify-content-center">
        <Button
          type="button"
          className="m-2"
          onClick={() => closeListSave()}
          value="Add"
        />
        <Button
          type="button"
          className="m-2"
          onClick={() => closeListCancel()}
          value="Cancel"
        />
      </div>
    </>
  );
};

export default OrganizationList;
