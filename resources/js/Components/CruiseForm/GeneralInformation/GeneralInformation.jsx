import HorizontalTabs from "../../BaseComponents/Tabs/HorizontalTabs";
import CollateCenter from "./CollateCenter/CollateCenter";
import Objectives from "./Objectives/Objectives";
import Cruise from "./Cruise/Cruise";
import Platform from "./Platform/Platform";
import ParametersAndInstruments from "./ParametersAndInstruments/ParametersAndInstruments";
import ResponsibleParty from "./ResponsibleParty/ResponsibleParty";
const GeneralInformation = () => {
  return (
    <>
      <HorizontalTabs
        title="General Information"
        tabs={[
          {
            name: "Cruise",
            content: <Cruise />,
            path: "cruise",
          },
          {
            name: "Objectives and Brief of cruise",
            content: <Objectives />,
            path: "purpose-and-objectives",
          },
          {
            name: "Platform",
            content: <Platform />,
            path: "platform",
          },
          {
            name: "Parameters and Instruments",
            content: <ParametersAndInstruments />,
            path: "parameters-and-instruments",
          },
          {
            name: "Responsible Party",
            content: <ResponsibleParty />,
            path: "reasonable-party",
          },
          {
            name: "Collate Center",
            content: <CollateCenter />,
            path: "collate-center",
          },
        ]}
      />
    </>
  );
};

export default GeneralInformation;
