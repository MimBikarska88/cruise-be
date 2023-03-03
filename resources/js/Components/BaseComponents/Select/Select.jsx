/**
 * External Dependencies.
 */
import { forwardRef } from "react";

/**
 * Internal Dependencies.
 */
import styles from "../../CruiseForm/CruiseForm.module.css";

const Select = forwardRef((props, ref) => {
  const { title, data = [], className, onChange, name } = props;

  return (
    <>
      <div className="pt-3">
        <h4 className="mt-3 mb-1 text-left">{title}</h4>

        <select
          ref={ref}
          className={`btn-outline-dark rounded-0 custom-select single-input ${styles["single-input"]} ${styles["select"]} ${className}`}
          onChange={onChange}
          name={name}
        >
          {data.map((o, index) => (
            <option value={index} className={`${styles["option"]}`}>
              {o}
            </option>
          ))}
        </select>
      </div>
    </>
  );
});

export default Select;
