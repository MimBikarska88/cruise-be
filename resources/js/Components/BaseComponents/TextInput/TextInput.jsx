/**
 * External Dependencies.
 */
import { forwardRef } from "react";

/**
 * Internal Dependencies.
 */
import styles from "../../CruiseForm/CruiseForm.module.css";

const TextInput = forwardRef((props, ref) => {
  const {
    label = "",
    className = "",
    type = "text",
    name = "",
    ...rest
  } = props;

  return (
    <div className="mt-10">
      <label className={`d-inline-block ${styles.label}`} htmlFor={name}>
        {label}
      </label>

      <input
        ref={ref}
        className={`single-input d-inline-block btn-outline-dark ${styles["single-input"]} ${className}`}
        type={type}
        name={name}
        {...rest}
      />
    </div>
  );
});
export default TextInput;
