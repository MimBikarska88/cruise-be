import styles from "./Table.module.css";
const TableList = (props) => {
  const { displayFields, displayRows, title, delimeter } = props;
  return (
    <>
      <div className={styles.selectedRows}>
        {displayRows.length === 0 ? (
          <>
            <h4 className="text-center m-2">No {title} selected</h4>
          </>
        ) : (
          <ul className="list-group d-block list-group-flush">
            {displayRows.map((value) => (
              <li className="list-group-item">
                {displayFields
                  .map((field) => value[`${field}`])
                  .join(delimeter ? delimeter : " - ")}
              </li>
            ))}
          </ul>
        )}
      </div>
    </>
  );
};
export default TableList;
