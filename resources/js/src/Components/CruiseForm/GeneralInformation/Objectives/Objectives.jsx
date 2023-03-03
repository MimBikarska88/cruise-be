/**
 * External Dependencies.
 */
import { Controller, useFormContext } from "react-hook-form";

/**
 * Internal Dependencies.
 */
import styles from "../../CruiseForm.module.css";
import TextArea from "../../../BaseComponents/TextArea/TextArea";
import TextInput from "../../../BaseComponents/TextInput/TextInput";

const Objectives = () => {
  const form = useFormContext();

  return (
    <>
      <div className={`mt-2 container-fluid ${styles["organizations-info"]}`}>
        <Controller
          control={form.control}
          name="general.objectives.purpose"
          render={({ field }) => (
            <TextArea label="Objective/Purpose of the cruise *" {...field} />
          )}
        />

        <Controller
          control={form.control}
          name="general.objectives.project"
          render={({ field }) => <TextInput label="Project" {...field} />}
        />
      </div>
    </>
  );
};

export default Objectives;
