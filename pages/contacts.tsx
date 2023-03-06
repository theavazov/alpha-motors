import { CustomHead } from "../components/CustomHead";
import { Form } from "../components/form/Form";
import { Layout } from "../components/Layout";
import { Location } from "../components/location/Location";
import styles from "../styles/contacts.module.css";

export default function AboutPage() {
  return (
    <>
      <CustomHead title={"Alpha motors | Contacts"} />
      <Layout>
        <Location title="Contacts" location="Contacts" />
        <section>
          <div className={styles.map}>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95942.65769713417!2d69.2093272937321!3d41.282576225585736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b0cc379e9c3%3A0xa5a9323b4aa5cb98!2sTashkent%2C%20O%60zbekiston!5e0!3m2!1suz!2s!4v1676463680416!5m2!1suz!2s"
              width="600"
              height="450"
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </section>
        <Form />
      </Layout>
    </>
  );
}
